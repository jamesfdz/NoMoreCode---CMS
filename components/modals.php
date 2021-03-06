<?php

//including config and db
require_once( $_SERVER["DOCUMENT_ROOT"] . "/processreq/db/config.php" );

require_once( LIBRARY_PATH . "db.php" );

//used to capture error
$error = 0;
$errorMessage = "";
$errorCode = 0;

?>

<!-- Shortcut image Modal start here -->
<div id="image_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-center w-100 font-weight-bold">Manage Images</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
               <!--  <label class="header" data-header="image_header" for="header_image_header">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp; <span>Image</span>
                </label> -->
                <input class="header_check" type="checkbox" checked="true" id="header_image_header">
                <div class="section imageHedaer" data-section="image_header">
                    <div class="row" id="imagePaddingBoxModel"> 
                        <div class="col-5">
                            <div class="row" >
                                <div class="col-6 marginZeroAuto">
                                    <input type="text" name="" value="" id="imageTopPadding" placeholder="Padding Top" class="input_field_j allInputs_j form-control placeholderMiddle" data-toggle="tooltip" title="Enter top padding"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 maxWidthChange">
                                    <input type="text" name="" value="" id="imageLeftPadding" placeholder="Left" class="input_field_j allInputs_j form-control" data-toggle="tooltip" title="Enter left padding" />
                                </div>    
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-5">
                                            <input type="text" name="" value="" id="imageWidth" placeholder="Width" class="input_field_j allInputs_j form-control" data-toggle="tooltip" title="Enter width" />
                                        </div>
                                        <div class="col-2">*</div>
                                        <div class="col-5">
                                            <input type="text" name="" value="" id="imageHeight" placeholder="height" class="input_field_j allInputs_j form-control" data-toggle="tooltip" title="Enter height"/>
                                        </div>
                                    </div>
                                </div>    
                                <div class="col-3 maxWidthChange">
                                    <input type="text" name="" value="" id="imageRightPadding" placeholder="Right" class="input_field_j allInputs_j form-control" data-toggle="tooltip" title="Enter right padding" />
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-6 marginZeroAuto">
                                    <input type="text" name="" value="" id="imageBottomPadding" placeholder="Padding Bottom" class="input_field_j allInputs_j form-control placeholderMiddle" data-toggle="tooltip" title="Enter bottom padding" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="alt" value="" id="imageAlt" placeholder="Alt" class="input_field_j allInputs_j form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-3 pl1 pr1">
                            <img id="currentImage_modal" class="img-responsive img-thumbnail" src="images/1.gif" alt="" />
                        </div>
                        <div class="col-4">
                            <!-- <img src="#" id="selected-thumbnail" /> -->
                            <form method="post" id="uploadForm" enctype="multipart/form-data" action="processreq/upload.php">
                                <div class="btn-group btn-group-sm" role="group" >
                                    <input class="form-control" type="file" name="images[]" id="images" multiple >
                                    <br>
                                    <input type="submit" name="submit" value="UPLOAD" class="btn btn-primary" />
                                    <a href="javascript:;" class="btn btn-success showImagesAjaxBtn" ><i class="fa fa-refresh"></i></a>
                                    <a href="javascript:;" class="btn btn-danger" id="confirmDeleteImages"><i class="fa fa-trash"></i></a>
                                </div>
                            </form>
                            <!-- display upload status -->
                            <div id="uploadStatus"></div>
                        </div>    
                    </div>
                </div>
                <hr>
                <div class="form-group" style="padding: 0px 17px">
                    <div class="row">
                        <div class="gallery" id="imagesPreview"></div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shortcut image Modal ends here -->


<!-- Shortcut Info Modal start here -->
<div class="modal fade" id="shortcutsInfo" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
          <h4 class="modal-title text-center w-100 font-weight-bold">Keyboard Shortcuts</h4>
        </div>
        <div class="modal-body">
            <table class="table-striped">
              <thead class="table-head">
                <tr>
                  <th class="table-head"><strong>Shortcut Name</strong></th>
                  <th class="table-head"><strong>Shortcut Key</strong></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="table-body">Bold</td>
                  <td class="table-body">ALT + B</td>
                </tr>
                <tr>
                  <td class="table-body">Underline</td>
                  <td class="table-body">ALT + U</td>
                </tr>
                <tr>
                  <td class="table-body">Italics</td>
                  <td class="table-body">ALT + I</td>
                </tr>
                <tr>
                  <td class="table-body">Superscript</td>
                  <td class="table-body">ALT + S</td>
                </tr>
                <tr>
                  <td class="table-body">Link</td>
                  <td class="table-body">ALT + L</td>
                </tr>
                <tr>
                  <td class="table-body">Text Color</td>
                  <td class="table-body">ALT + C</td>
                </tr>
                <tr>
                  <td class="table-body">Show Preview</td>
                  <td class="table-body">ALT + P</td>
                </tr>
                <tr>
                  <td class="table-body">Download HTML</td>
                  <td class="table-body">ALT + O</td>
                </tr>
                <tr>
                  <td class="table-body">Get User IP</td>
                  <td class="table-body">ALT + G</td>
                </tr>
                <tr>
                  <td class="table-body">Undo</td>
                  <td class="table-body">ALT + Z</td>
                </tr>
                <tr>
                  <td class="table-body">Redo</td>
                  <td class="table-body">ALT + Y</td>
                </tr>
                <tr>
                  <td class="table-body">Content Save & Edit</td>
                  <td class="table-body">ALT + Q</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
      
    </div>
</div>

<!-- Shortcut info modal ends here -->


<!-- Superscript modal starts here -->
<div class="modal fade" role="dialog" id="superscriptModal">
</div>
<!-- Superscript modal ends here -->

<!-- hyperLink modal starts here -->
<div class="modal fade" role="dialog" id="hyperLinkModal">
</div>
<!-- hyperLink modal ends here -->


<div class="modal fade" id="download" tabindex="-1" role="dialog" aria-labelledby="download" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class='fa fa-save'></i>&nbsp;Save as </h4>
            </div>
            <div class="modal-body" id='sourceCode'>
                <textarea id="src" rows="10"></textarea>
                <textarea id="model" rows="10" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class='fa fa-close'></i>&nbsp;Close</button>
                <button type="button" class="btn btn-success" id="srcSave"><i class='fa fa-save'></i>&nbsp;Save</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="snippetModal" role="dialog">
  <div class="modal-dialog" style="width: 700px">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        <h4 class="modal-title">
            Manage Snippets
        </h4>
      </div>
        <div class="modal-body text-left">
            <br>
            <div class="row">
                <div id="processText" class="hidden1">
                    <!-- use to process text do not remove-->
                </div>
                <div class="col-md-12 text-center" id="snippetAlert">    
                    <div class="alert alert-success alert-dismissible fade in">
                      <span class="warningMessage"></span>  
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="text-center">
                        <button id="addSnippetButton">Save</button>
                        <button id="closeSnippetButton">Close</button>
                    </div>
                    <div class="toCanvas"></div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>HTML</label>
                            <input type="text" class="hidden" value="1" id="snippetStoreType" name="snippetStoreType" />
                            <textarea readonly="" class="form-control" id="toTextArea"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Image</label>
                            <div class="toPic"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
    
  </div>
</div>


<!-- Snippet Modal start here -->
<div class="modal fade" id="snippetShowModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                <h4 class="modal-title">Manage Snippets</h4>
            </div>
            <div class="modal-body" style="padding: 20px 0">
                <div class="row">
                    <div class="col-md-12">
                        <ol id="snippetShowModalList">
                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Snippet modal ends here -->


<div class="modal fade" id="pdfToPng" role="dialog">
  <div class="modal-dialog" style="width: 850px">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        <h4 class="modal-title">Select Pdf</h4>
      </div>
      <div class="modal-body text-center">
        <p class="noteText color-black"><b>Step 1 :</b> Click on Select PDF button</p>
        <p class="noteText color-black"><b>Step 2 :</b> After opening modal please select PDF file.</p>
        <p class="noteText color-black"><b>Step 3 :</b> After finishing PDF importing, click on refresh button.</p>
        <p class="noteText"><b>Note :</b>  Please wait after clicking select PDF button, Sometime it may take 5-10 seconds to open pdf modal</p>
        <br>
        <button id="file-to-upload">Select PDF</button> 
        <button id="refreshPDFButn"><i class="fa fa-refresh"></i></button>
        <br>
        <div class="text-center loading_icon" style="display: none">
            <br>
            <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
        </div>
        <br>

      </div>
      <br>
    </div>
    
  </div>
</div>


<!-- create project modal starts here -->

<div class="modal fade" id="createProjectModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text-center w-100 font-weight-bold">Create New Project</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body mx-3">
        
        <div class="md-form mb-3">
            <label data-error="wrong" data-success="right" for="emailType">Select Email Type</label>
            <select class="form-control" id="emailType">
              <option value="veeva">Veeva Email</option>
              <option value="veeva_responsive">Veeva Responsive Email</option>
              <option value="et">Exact Target Email</option>
              <option value="et_responsive">ET Responsive Email</option>
              <option value="speaker">Speaker Email</option>
            </select>
        </div>

        <div class="md-form mb-3">
          <label data-error="wrong" data-success="right" for="projectName">Project Name</label>
          <input type="text" id="projectName" class="form-control validate" placeholder="Please Enter Project Name">
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-success" id="createNewProject">Create Project</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- create project modal ends here -->

<!-- open project modal starts here -->

<div class="modal fade" id="openProjectModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text-center w-100 font-weight-bold">Open Project</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body mx-3">
        <div class="row">
        <?php
          $sqlAllProject = 'SELECT * FROM projects WHERE active = 1';

          $sqlAllProjectResult = PDO_FetchAll($sqlAllProject);

            if($sqlAllProjectResult != ""){

              for($i = 0; $i < count($sqlAllProjectResult); $i++){
                $projectName = $sqlAllProjectResult[$i]["projectName"];
                $projectType = $sqlAllProjectResult[$i]["projectType"];
                $projectid = $sqlAllProjectResult[$i]["projectid"];
                $firstLetter = strtoupper($projectName[0]);
              
        ?>
        
          <div class="col-4">
            <div class="main-div">
              <div class="panel text-center">
                <a href="editor.php?_projectId=<?php echo $projectid?>&_projectName=<?php echo $projectName?>&_projectType=<?php echo $projectType?>">
                  <p><?php echo $firstLetter?></p>
                  <span><?php echo $projectName?></span>
                </a>
              </div>
            </div>
          </div>
        
        <?php
          }
        }
        ?>
        </div>
      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-success" id="createNewProject">Create Project</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>

<!-- create project modal ends here -->

