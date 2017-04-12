<div class="panel-heading">
    Output
</div>
<div id="output-body" class="panel-body">
    <?php
        require("commands.php");
        if($_FILES['codefile']['error']==0){
            $target_file = "../uploads/".basename($_FILES["codefile"]["name"]);
            move_uploaded_file($_FILES["codefile"]["tmp_name"], $target_file);
            $obj=new ExecuteCode($target_file);
            $obj->runCode();
            if($obj->getReturnValue()==0){
                echo "<pre>";
                foreach($obj->getOutput() as $i){
                    echo "$i<br />";
                }
                echo "</pre>";
            }
            else {
                echo "<pre style='color:red'>";
                $lines = file("log");
                foreach($lines as $line)
                    echo $line."<br />";
                    echo "</pre>";
                }
            }
            else if($_FILES['codefile']['error']==UPLOAD_ERR_NO_FILE){
                echo "<pre style='color:red'>No file was uploaded.</pre>";
            }
            else if($_FILES['codefile']['error']==UPLOAD_ERR_PARTIAL){
                echo "<pre>The uploaded file was only partially uploaded.</pre>";
            }
    ?>
</div>
