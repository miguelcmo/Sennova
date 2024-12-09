<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Survey $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = $survey->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member'), 'url' => ['member/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container survey-view">

    <h3><?php echo Yii::t('app', 'Take Survey: '); echo Html::encode($this->title) ?></h3>

    <!-- Render the form -->
    <?php 
        $form = ActiveForm::begin();
            echo '<div class="accordion" id="surveyAccordion">';
            echo "<br>";
            foreach ($sections as $index => $section) {
                $isFirstSection = ($index === 0);  // Verifica si es el primer ítem

                echo '<div class="accordion-item">';
                echo '<h2 class="accordion-header" id="heading' . $index . '">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $index . '" aria-expanded="' . ($isFirstSection ? 'true' : 'false') . '" aria-controls="collapse' . $index . '">
                        ' . htmlspecialchars($section->title) . '
                    </button>
                </h2>';
                
                $sectionQuestions = array_filter($questions, fn($q) => $q->section_id == $section->id);
                
                echo '<div id="collapse' . $index . '" class="accordion-collapse collapse' . ($isFirstSection ? ' show' : '') . '" aria-labelledby="heading' . $index . '" data-bs-parent="#surveyAccordion">
                    <div class="accordion-body">';

                echo "<ol>";
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
                            echo "<li>";
                            echo $form->field($model, $attributeName)->textInput(['maxlength' => true])->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'paragraph': // Respuesta larga
                            echo "<li>";
                            echo $form->field($model, $attributeName)->textarea(['rows' => 4])->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'multiple_choice': // Opción múltiple
                            $filteredOptions = array_filter($options, fn($o) => $o->question_id == $question->id);
                            $radioOptions = ArrayHelper::map($filteredOptions, 'id', 'option_text');
                            echo "<li>";
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
                            echo "</li>";
                            echo "<br>";
                            break;

                        case 'true_false': // Opción múltiple
                            $filteredOptions = array_filter($options, fn($o) => $o->question_id == $question->id);
                            $trueFalseOptions = ArrayHelper::map($filteredOptions, 'id', 'option_text');
                            echo "<li>";
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
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'checkbox': // Casillas de verificación
                            $filteredOptions = array_filter($options, fn($o) => $o->question_id == $question->id);
                            $checkboxOptions = ArrayHelper::map($filteredOptions, 'id', 'option_text');
                            echo "<li>";
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
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'drop_down_list': // Lista desplegable
                            $filteredOptions = array_filter($options, fn($o) => $o->question_id == $question->id);
                            $filteredOptions = ArrayHelper::map($filteredOptions, 'id', 'option_text');
                            echo "<li>";
                            echo $form->field($model, $attributeName)->dropDownList($filteredOptions, ['prompt' => '-- Escoje una opción --'])->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'date': // Fecha
                            echo "<li>";
                            echo $form->field($model, $attributeName)->input('date')->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;

                        case 'email': // Correo Electrónico
                            echo "<li>";
                            echo $form->field($model, $attributeName)->input('email')->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'number': // Número
                            echo "<li>";
                            echo $form->field($model, $attributeName)->input('number')->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;

                        case 'time': // Hora
                            echo "<li>";
                            echo $form->field($model, $attributeName)->input('time')->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'url': // Url
                            echo "<li>";
                            echo $form->field($model, $attributeName)->input('url')->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        default:
                            // Para tipos de preguntas no definidos
                            echo "<li>";
                            echo "<p class='m-0'>Tipo de pregunta no soportado.</p>";
                            echo "</li>";
                            echo "<br>";
                    }  
                }
                echo "</ol>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo '</div>';
            echo '<br>';
            echo Html::submitButton('Enviar Respuestas', ['class' => 'btn btn-primary w-100 text-white']);
        ActiveForm::end();
    ?>
    <br>
    <br>
</div>


<?php /*

<div class="container survey-view">

    <h3><?php echo Yii::t('app', 'Take Survey: '); echo Html::encode($this->title) ?></h3>

    <!-- Render the form -->
    <?php 
        $form = ActiveForm::begin();
            echo '<div class="accordion" id="surveyAccordion">';
            echo "<br>";
            foreach ($sections as $index => $section) {
                $isFirstSection = ($index === 0);  // Verifica si es el primer ítem

                echo '<div class="accordion-item">';
                echo '<h2 class="accordion-header" id="heading' . $index . '">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $index . '" aria-expanded="' . ($isFirstSection ? 'true' : 'false') . '" aria-controls="collapse' . $index . '">
                        ' . htmlspecialchars($section->title) . '
                    </button>
                </h2>';
                
                $sectionQuestions = array_filter($questions, fn($q) => $q->section_id == $section->id);
                
                echo '<div id="collapse' . $index . '" class="accordion-collapse collapse' . ($isFirstSection ? ' show' : '') . '" aria-labelledby="heading' . $index . '" data-bs-parent="#surveyAccordion">
                    <div class="accordion-body">';

                echo "<ol>";
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
                            echo "<li>";
                            echo $form->field($model, $attributeName)->textInput(['maxlength' => true])->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'paragraph': // Respuesta larga
                            echo "<li>";
                            echo $form->field($model, $attributeName)->textarea(['rows' => 4])->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'multiple_choice': // Opción múltiple
                            $filteredOptions = array_filter($options, fn($o) => $o->question_id == $question->id);
                            $radioOptions = ArrayHelper::map($filteredOptions, 'id', 'option_text');
                            echo "<li>";
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
                            echo "</li>";
                            echo "<br>";
                            break;

                        case 'true_false': // Opción múltiple
                            $filteredOptions = array_filter($options, fn($o) => $o->question_id == $question->id);
                            $trueFalseOptions = ArrayHelper::map($filteredOptions, 'id', 'option_text');
                            echo "<li>";
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
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'checkbox': // Casillas de verificación
                            $filteredOptions = array_filter($options, fn($o) => $o->question_id == $question->id);
                            $checkboxOptions = ArrayHelper::map($filteredOptions, 'id', 'option_text');
                            echo "<li>";
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
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'drop_down_list': // Lista desplegable
                            $filteredOptions = array_filter($options, fn($o) => $o->question_id == $question->id);
                            $filteredOptions = ArrayHelper::map($filteredOptions, 'id', 'option_text');
                            echo "<li>";
                            echo $form->field($model, $attributeName)->dropDownList($filteredOptions, ['prompt' => '-- Escoje una opción --'])->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'date': // Fecha
                            echo "<li>";
                            echo $form->field($model, $attributeName)->input('date')->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;

                        case 'email': // Correo Electrónico
                            echo "<li>";
                            echo $form->field($model, $attributeName)->input('email')->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'number': // Número
                            echo "<li>";
                            echo $form->field($model, $attributeName)->input('number')->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;

                        case 'time': // Hora
                            echo "<li>";
                            echo $form->field($model, $attributeName)->input('time')->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        case 'url': // Url
                            echo "<li>";
                            echo $form->field($model, $attributeName)->input('url')->label($question->question_text);
                            echo "</li>";
                            echo "<br>";
                            break;
                        
                        default:
                            // Para tipos de preguntas no definidos
                            echo "<li>";
                            echo "<p class='m-0'>Tipo de pregunta no soportado.</p>";
                            echo "</li>";
                            echo "<br>";
                    }  
                }
                echo "</ol>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo '</div>';
            echo '<br>';
            echo Html::submitButton('Enviar Respuestas', ['class' => 'btn btn-primary w-100 text-white']);
        ActiveForm::end();
    ?>
    <br>
    <br>
</div>

*/ ?>