<?php
if (isset($error)) { //if you upload the wrong file type, you will get an error message
    echo $error;
}
?>
<!--Upload form for xml file-->
<div class="container upload">
    <h3>Upload a file</h3> <br>
    <form id="uploadfile" enctype="multipart/form-data" method="post" action="index.php?controller=upload&action=upload">
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000"/> <!--maximum file size allowed for upload-->
        <input id="fileupload" name="myfile" type="file"/> <br><br>
        <input class="btn btn-outline-primary" type="submit" value="submit" id="submit" />
    </form>
</div>  

