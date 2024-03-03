<?php

$page = "";
$title = "";
$file= array();

$epage = "";
$etitle = "";
$efile = "";

if(isset($_POST['submit']))
{
    $page = $_POST['page'];
    $title = $_POST['title'];
    $file = $_FILES['file'];

    $er = 0;
    if($page == "0")
    {
        $er++;
        $epage = '<span class="error">Required</span>';
    }

    if($title == "")
    {
        $er++;
        $etitle = '<span class="error">Required</span>';
    }

    if($file['name'] == "")
    {
        $er++;
        $efile = '<span class="error">Required</span>';
    }
    else if($file['size'] > (10 * 1024 * 1024))
    {
        $er++;
        $efile = '<span class="error">File Must Less Than 10 MB</span>';
    }
    else{
        $a = explode(".", $file['name']);
        if(is_array($a) && count($a) > 1)
        {
            $ext = strtolower($a[count($a)-1]);
            if(!($ext == "doc" || $ext == "pdf" || $ext == "docx"))
            {
                $er++;
                $efile = '<span class="error">Only Doc, Docx, Pdf Supported</span>';
            }
        }
        else{
            $er++;
            $efile = '<span class="error"> . Nai Kere</span>';
        }
    }

//    if($er == 0)
//    {
//        $sql = "insert into pageFile(pagefileId, title, file) values( ".ms($page).", '".ms($title)."', '".ms($file['name'])."')";
//        if(mysqli_query($cn, $sql))
//        {
//            $sp = $file['tmp_name'];
//            $dp = "uploads/files/".mysqli_insert_id($cn)."_".$file['name'];
//            move_uploaded_file($sp, $dp);
//
//            print '<span class="success">File Updated</span>';
//            $pagefile = "";
//            $title = "";
//            $file = array();
//        }
//        else{
//            print '<span class="error">'.mysqli_error($cn).'</span>';
//        }
//    }

}

?>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-row justify-content-around">
        <div class="col-md-6 mb-5 ">

            <label for="pg">Page</label><br>
            <select name="page" id="pg" class="form-control">
                <option value="0">Select</option>
                <?php

                $sql = "select id, title from pagefile";

                $table = mysqli_query($cn, $sql);
                while($row = mysqli_fetch_assoc($table))
                {
                    if($pagefile == $row["id"])
                    {
                        print '<option value="'.$row["id"].'" selected>'.$row["title"].'</option>';
                    }
                    else{
                        print '<option value="'.$row["id"].'">'.$row["title"].'</option>';
                    }
                }

                ?>
            </select><?php print $epage; ?><br><br>

            <label for="tl">Title</label><br>
            <input type="text" name="title" class="form-control" id="tl" value="<?php print $title; ?>"/><br><br>

            <label for="fl">File</label><br>
            <input type="file" name="file" class="form-control" id="fl" /><?php print $efile; ?><br><br>


            <input type="submit" class="btn btn-success form-control" name="update" value="Update"/>

        </div>
    </div>
</form>