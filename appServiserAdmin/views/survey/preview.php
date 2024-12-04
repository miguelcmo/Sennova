<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Survey $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = $survey->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Surveys'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="survey-view">

    <h3><?php echo Yii::t('app', 'Survey Preview: '); echo Html::encode($this->title) ?></h3>

    <!-- Render the form -->
    <p>Survey: <?= htmlspecialchars($survey->title) ?></p>
    <?php 
        $form = ActiveForm::begin();
        echo "<ul>";
            foreach ($sections as $section) {
            echo "<li>";
                echo htmlspecialchars($section->title);
                $sectionQuestions = array_filter($questions, fn($q) => $q->section_id == $section->id);
                
                foreach ($attributes as $attributeName => $label) {
                    // Find the corresponding question
                    $filteredQuestion = array_filter($sectionQuestions, fn($q) => $q->id == $attributeName); // Ensure comparison is valid
                    $question = current($filteredQuestion); // Get the first match (if any)

                    // Verifica si se encontró una pregunta válida
                    if (!$question) {
                        continue; // Salta al siguiente atributo
                    }

                    // Renderizamos según el tipo de pregunta
                    switch ($question->question_type) {
                        case 'short_text': // Respuesta corta
                            echo $form->field($model, $attributeName)->textInput(['maxlength' => true])->label($question->question_text);
                            break;
                        
                        case 'paragraph': // Respuesta larga
                            echo $form->field($model, $attributeName)->textarea(['rows' => 4])->label($question->question_text);
                            break;
                        
                        case 'multiple_choice': // Opción múltiple
                            $filteredOptions = array_filter($options, fn($o) => $o->question_id == $question->id);
                            $radioOptions = ArrayHelper::map($filteredOptions, 'id', 'option_text');
                            echo $form->field($model, $attributeName)->radioList($radioOptions,
                            [
                                'item' => function ($index, $label, $name, $checked, $value) {
                                    return Html::tag('label', 
                                        Html::radio($name, $checked, ['value' => $value]) . ' ' . $label, 
                                        ['class' => 'd-block fw-normal']
                                    );
                                }
                            ]
                            )->label($question->question_text);
                            break;

                        case 'true_false': // Opción múltiple
                            $filteredOptions = array_filter($options, fn($o) => $o->question_id == $question->id);
                            $trueFalseOptions = ArrayHelper::map($filteredOptions, 'id', 'option_text');
                            echo $form->field($model, $attributeName)->radioList($trueFalseOptions,
                            [
                                'item' => function ($index, $label, $name, $checked, $value) {
                                    return Html::tag('label', 
                                        Html::radio($name, $checked, ['value' => $value]) . ' ' . $label, 
                                        ['class' => 'd-block fw-normal']
                                    );
                                }
                            ]
                            )->label($question->question_text);
                            break;
                        
                        case 'checkbox': // Casillas de verificación
                            $filteredOptions = array_filter($options, fn($o) => $o->question_id == $question->id);
                            $checkboxOptions = ArrayHelper::map($filteredOptions, 'id', 'option_text');
                            echo $form->field($model, $attributeName)->checkboxList($checkboxOptions,
                            [
                                'item' => function ($index, $label, $name, $checked, $value) {
                                    return Html::tag('label', 
                                        Html::checkbox($name, $checked, ['value' => $value]) . ' ' . $label, 
                                        ['class' => 'd-block fw-normal']
                                    );
                                }
                            ]
                            )->label($question->question_text);
                            break;
                        
                        case 'drop_down_list': // Lista desplegable
                            $filteredOptions = array_filter($options, fn($o) => $o->question_id == $question->id);
                            $filteredOptions = ArrayHelper::map($filteredOptions, 'id', 'option_text');
                            echo $form->field($model, $attributeName)->dropDownList($filteredOptions, ['prompt' => '-- Escoje una opción --'])->label($question->question_text);
                            break;
                        
                        case 'date': // Fecha
                            echo $form->field($model, $attributeName)->input('date')->label($question->question_text);
                            break;

                        case 'email': // Correo Electrónico
                            echo $form->field($model, $attributeName)->input('email')->label($question->question_text);
                            break;
                        
                        case 'number': // Número
                            echo $form->field($model, $attributeName)->input('number')->label($question->question_text);
                            break;

                        case 'time': // Hora
                            echo $form->field($model, $attributeName)->input('time')->label($question->question_text);
                            break;
                        
                        case 'url': // Url
                            echo $form->field($model, $attributeName)->input('url')->label($question->question_text);
                            break;
                        
                        default:
                            // Para tipos de preguntas no definidos
                            echo "<p>Tipo de pregunta no soportado.</p>";
                    }   
                }
            }
            echo "</li>";
            echo Html::submitButton('Submit', ['class' => 'btn btn-primary']);
        ActiveForm::end();
    ?>
</div>