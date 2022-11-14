<?php

use Core\FH;
use Core\Session;

?>


<?php $this->start('body'); ?>
    <div class="col-md-12 mt-3">
        <h3>Search Courses</h3>
    </div>
    <hr>
    <div>
        <?php
            if(Session::exists('errors')):
                echo FH::displayErrors(Session::get('errors'));
                Session::delete('errors');
            endif;
?>
    </div>
    <div class="col-md-6 offset-md-3 mt-3" >
        <div class="card" >
            <div class="card-body" >
                <form class="form" id="product_form" method="post" action="/scrape">
                    <?= FH::csrfInput(); ?>
                    <?=
                FH::inputBlock(
                    'text',
                    'Category Name',
                    'category',
                    '',
                    [
                        'class' => 'form-control input-sm',
                        'placeholder' => 'Type a category here e.g data-science',
                        'required' => true
                    ],
                    ['class' => 'form-group']
                );
?>
                    <?= FH::submitBlock('Search', ['class' => 'btn btn-primary'], ['class' => 'form-group d-flex justify-content-end'])?>
                </form>
            </div>
        </div>
    </div>
<?php $this->end(); ?>

