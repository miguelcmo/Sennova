<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var pms\models\Profile $model */

// $this->title = $model->id;
$this->title = Yii::t('app', 'Profile View');
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view">

<!-- Manage Exceptions and Errors -->
<?php
	if (Yii::$app->session->hasFlash('changePasswordSuccess')) {
?>
<div class="alert alert-success alert-dismissible mb-2" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<span><i class="fas fa-smile"></i> <?= Yii::$app->session->getFlash('changePasswordSuccess', true) ?></span>
</div>
<?php
	}
?>
<!-- End of Exception manager -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="row justify-content-center">
                  <img class="profile-user-img img-circle"
                    style="margin: 0;",
                    <?php 
                        if (!$model->image) {
                            echo 'src="./img/profile/generic-user-m.png"';
                        } else {
                            echo 'src="' . $model->image . '"';
                        }
                    ?>
                       alt="User profile picture">
                       <span class="align-self-end"><?= Html::button('<i class="fas fa-camera" data-toggle="modal" data-target="#imageUploadModal"></i>', ['class' => 'btn btn-link', 'style' => 'padding: 0;']) ?></span>
                </div>

                <!-- Modal for Image Upload-->
                <div class="modal fade" id="imageUploadModal" tabindex="-1" aria-labelledby="imageUploadModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageUploadModalLabel"><?= Yii::t('app', 'Change profile image') ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body"> 
                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                        <p>Selecciona una imagen en formato cuadrado en resoluciones bajas como <i>256x256 px</i> o <i>512x5212 px</i>, los formatos admitidos son <i>.jpg .png .gif</i></p>
                        <?= $form->field($imgUpload, 'imageFile')->fileInput() ?>
                    </div>
                    <div class="modal-footer">
                        <?= Html::submitButton(Yii::t('app', 'Upload'), ['name' => 'actionImageUpload', 'value' => 'actionImageUpload' ,'class' => 'btn btn-primary']) ?>
                        <!--<button type="submit" class="btn btn-primary" name="actionImageUpload" value="imageUpload"><?php // echo Yii::t('app', 'Upload') ?> </button>-->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>
                </div>


                <h3 class="profile-username text-center"><?= $model->fullName ?></h3>

                <p class="text-muted text-center"><?php // $model->employeeRole ?></p> <!-- employeeRole (string) was changed by role (int) -->

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b><?= Yii::t('app', 'Ideas') ?></b> <a class="float-right">12</a>
                  </li>
                  <li class="list-group-item">
                    <b><?= Yii::t('app', 'Boards') ?></b> <a class="float-right">5</a>
                  </li>
                  <li class="list-group-item">
                    <b><?= Yii::t('app', 'Workspaces') ?></b> <a class="float-right">3</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b><?= Yii::t('app', 'Go to my dashboard') ?></b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= Yii::t('app', 'About Me') ?></h3><span class="float-right"><?= Html::a('<i class="far fa-edit"></i>', ['update-about-me', 'profileId' => $model->profileId]) ?></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> <?= Yii::t('app', 'Education') ?></strong>
                <p class="text-muted"><?= $model->education ?></p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> <?= Yii::t('app', 'Location') ?></strong>
                <p class="text-muted"><?php if(!$model->location) { echo ""; } else { echo Yii::$app->params['city'][$model->location]; }; ?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> <?= Yii::t('app', 'skills') ?></strong>
                <p class="text-muted"><?= $model->skills ?></p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> <?= Yii::t('app', 'Notes') ?></strong>

                <p class="text-muted"><?= $model->notes ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <?php /*
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                      </div>
                    */ ?>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <?php /*
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                    */ ?>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <p><?= Html::button(Yii::t('app', 'Set Meeting Room'), ['class' => 'btn btn-light', 'data-toggle' => 'modal', 'data-target' => '#personalMeetingRoomModal']) ?>
                    &nbsp;<i class="fas fa-link">&nbsp;</i><?= Html::a($model->firstName . " Meeting Room Link", $model->alias) ?>&nbsp;&nbsp;<i onclick="copyToClipboard()" class="btn btn-link fas fa-copy" title="Copy to clipboard"></i></p>
                    <p><?= Html::button(Yii::t('app', 'Change Password'), ['class' => 'btn btn-light', 'data-toggle' => 'modal', 'data-target' => '#changePasswordModal']) ?>
                    &nbsp;<i class="fas fa-fingerprint"></i></p>

                    <span style="display:none" id="copyText"><?= $model->alias ?><span>
                     
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel"><?= Yii::t('app', 'Change Password') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php $form2 = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <?= $form2->field($changePassword, 'actualPassword')->input('password') ?>
        <?= $form2->field($changePassword, 'newPassword')->input('password') ?>
        <?= $form2->field($changePassword, 'newPasswordConfirm')->input('password') ?>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="actionChangePassword" value="changePassword"><?= Yii::t('app', 'Change Password') ?> </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php ActiveForm::end() ?>
      </div>
    </div>
  </div>
</div>

<!-- Personal Meeting Room Modal -->
<div class="modal fade" id="personalMeetingRoomModal" tabindex="-1" aria-labelledby="personalMeetingRoomModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="personalMeetingRoomModalLabel"><?= Yii::t('app', 'Personal Meeting Room') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php $form3 = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <?= $form3->field($model, 'alias')->textArea(['rows' => 3]) ?>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="actionChangePassword" value="changePassword"><?= Yii::t('app', 'Save') ?> </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php ActiveForm::end() ?>
      </div>
    </div>
  </div>
</div>


    <?php 
    /*
                        default yii2 view changed on 06/06/023 by MAC to improve the User Interface

    <p><?php // Html::encode($this->title) ?></p>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'firstName',
            'lastName',
            'govId',
            'fullName',
            'initials',
            'alias',
            'image',
            'telephone1',
            'telephone2',
            //'createdAt',
            //'createdBy',
            //'updatedAt',
            //'updatedBy',
            //'status',
            //'flag',
        ],
    ]) ?>
    */ ?>

</div>

<script>
function copyToClipboard() {
  const copyText = document.getElementById("copyText").innerText;

  // Create a temporary textarea to hold the text to be copied
  const textarea = document.createElement("textarea");
  textarea.value = copyText;

  // Append the textarea to the document
  document.body.appendChild(textarea);

  // Select the text inside the textarea
  textarea.select();

  // Copy the selected text to the clipboard
  document.execCommand("copy");

  // Remove the temporary textarea from the document
  document.body.removeChild(textarea);

  // Optionally, show a success message
  alert("Text copied to clipboard!");
}
</script>