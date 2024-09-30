<?php
$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">  
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Módulos',
                'number' => $courses,
                'icon' => 'fas fa-book',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Temas',
                'number' => $lessons,
                'theme' => 'success',
                'icon' => 'fas fa-comments',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Participantes',
                'number' => '136',
                'theme' => 'gradient-warning',
                'icon' => 'fas fa-users',
            ]) ?>
        </div>
    </div>
</div>