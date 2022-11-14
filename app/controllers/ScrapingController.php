<?php

namespace App\Controllers;

use Core\H;
use Core\Session;
use Core\Controller;
use App\Models\ScrapingFormValidator;
use Symfony\Component\Panther\Client;

class ScrapingController extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
    }

    public function index()
    {
        $this->render('scrape/index');
    }

    public function scrape()
    {
        $this->csrfCheck();
        $validator = new ScrapingFormValidator($this->get());
        $validator->validator();
        if (!empty($errors = $validator->getErrorMessages())) {
            Session::set('errors', $errors);
            return $this->redirect('/');
        }
        $url = $this->constructUrl($this->get('category'));
        H::dnd($url);
        $client = Client::createFirefoxClient();
        $client->request('GET', $url);
        $crawler = $client->waitForVisibility('div.rc-SearchResultsHeader');
        $links = $crawler->filter('div.ais-InfiniteHits > ul > li')->each(function ($node) {
            $link = $node->filter('div > div  > a')->attr('href');
            return $this->constructUrl().$link;
        });

        H::dnd($links);
    }

    private function constructUrl(?string $category = ""): string
    {
        $baseUrl = "https://www.coursera.org";
        $search = "/search?query=";
        $view = "/courses";
        if ($category) {
            return $baseUrl.$search.$category;
        }
        return $baseUrl.$view;
    }
}
