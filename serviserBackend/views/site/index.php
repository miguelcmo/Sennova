<?php
$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">  
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Cursos',
                'number' => '14',
                'icon' => 'fas fa-book',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Participantes',
                'number' => '410',
                 'theme' => 'success',
                'icon' => 'fas fa-users',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Foros',
                'number' => '136',
                'theme' => 'gradient-warning',
                'icon' => 'fas fa-comments',
            ]) ?>
        </div>
    </div>
</div>