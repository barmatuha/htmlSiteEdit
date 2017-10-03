<html>
<head>
    <style type="text/css">
        <? include "app/style.css" ?>
    </style>
    <title> Borma </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/style.css"/>

</head>
<body>

<div class="form-style-8">
    <form action = "clean.php" method = "post">
        <b>What to do:</b><br>
        <input type="radio" name="todo" value="addScr">Add script (before /body) <br>
        <input type="radio" name="todo" value="fileName">Change '-' to '_' in file names<br>
        <input type="radio" name="todo" value="fileType">Change file type<br>
        <input type="radio" name="todo" value="dash">Change '-' to '_' in URL-s<br>
        <input type="radio" name="todo" value="404urls">Clear 404 URLs<br>
        <input type="radio" name="todo" value="404img">Clear 404 IMG<br>
        <input type="radio" name="todo" value="block">Clear custom block<br>
        <input type="radio" name="todo" value="clearBlockWithoutDesc">clearBlockWithoutDesc<br>
        <input type="radio" name="todo" value="filesToRoot">Replace files from directories to root<br>
        <input type="radio" name="todo" value="year">Change text part<br>
        <input type="radio" name="todo" value="tagChange">Change context of teg<br>
        <input type="radio" name="todo" value="upText">Delete text from begin to symbol:<br>
        <input type="radio" name="todo" value="encodeCrash">Add meta charset="UTF-8" to pages <br>
        <input type="radio" name="todo" value="magic">magic (you don't need magic)<br>
        <input type="submit" />
    </form>

    <hr>
    <?php

    if( isset( $_POST['todo'] ) )
    {
        switch( $_POST['todo'] )
        {
            case 'addScr':
                echo '<form action="app/addScrBody.php" method="post">
                                <p>Input script:  <input type="text" name="scr" /></p>                       
                                <p><input type="submit" /></p>
                          </form>';
                break;
            case 'fileName':
                echo '<form action="app/changeFileName.php" method="post">
                                <input type="radio" name="fileName" value="fileNameA">Change filename from \'-\' to \'_\'<br>
                                <input type="radio" name="fileName" value="fileNameB">Change filename from \'_\' to \'-\'<br>
                                <p><input type="submit" /></p>
                          </form>';
                break;
            case 'fileType':
                echo '<form action="app/changeFileType.php" method="post">
                                <p>From:<select name="type1" style="width: 100px">
                                    <option value="html">html</option>
                                    <option value="php">php</option>
                                    </select></p>   
                                <p>To:<select name="type2" style="width: 100px">
                                    <option value="php">php</option>
                                    <option value="html">html</option>
                                    </select></p>                        
                                <p><input type="submit" /></p>
                          </form>';
                break;
            case 'dash':
                echo '<form action="app/changeURLs.php" method="post">
                                <input type="radio" name="dash" value="urlA">Change URL\'s from \'-\' to \'_\'<br>
                                <input type="radio" name="dash" value="urlB">Change URL\'s from \'_\' to \'-\'<br>
                                <p><input type="submit" /></p>
                          </form>';
                break;
            case '404urls':
                echo '<form action="app/clear404URLs.php" method="post">
                                <p>Input 404 url-s from screaming frog</p>
                                <p><textarea rows="10" cols="45" name="urls"></textarea></p>                                                
                                <p>Change part of URL from:<input type="text" name="urlOld" /></p>
                                <p>to (will delete, if empty):<input type="text" name="urlNew" /></p>                                              
                                <p><input type="submit" /></p>
                          </form>';
                break;
            case '404img':
                echo '<form action="app/clear404img.php" method="post">
                                <p>Input 404 img-s from screaming frog</p>
                                <p><textarea rows="10" cols="45" name="imgs"></textarea></p>                                                
                                <p>Change part of URL from:<input type="text" name="imgOld" /></p>
                                <p>to (will delete, if empty):<input type="text" name="imgNew" /></p>
                                <p>IMG!!!</p>
                                <p><input type="submit" /></p>
                          </form>';
                break;
            case 'block':
                echo '<form action="app/clearBloks.php" method="post">                                
                                <p>teg:<input type="text" name="teg" /></p>
                                <p>determinant:<input type="text" name="det" /></p>
                                <p>name:<input type="text" name="nam" /></p>
                                <p><input type="submit" /></p>
                          </form>';
                break;
            case 'filesToRoot':
                echo '<form action="app/filesToRoot.php" method="post">
                                <p>Just press "submit"</p>  
                                <p><input type="submit" /></p>
                          </form>';
                break;
            case 'magic':
                echo '<form action="app/htmlToFolder+LinksEdit.php" method="post">
                                <p>Have to put all files to root into directory, named as file -> rename file into "index.html" -> edit url\'s, img\'s, css</p>
                                <p>Delete this part from url\'s:<input type="text" name="pathEdit" /></p>
                                <p><input type="submit" /></p>
                          </form>';
                break;
            case 'clearBlockWithoutDesc':
                echo '<form action="app/clearBlockWithoutDesc.php" method="post">                                
                                <p>teg:<input type="text" name="teg" /></p>                                                             
                                <p><input type="submit" /></p>
                          </form>';
                break;
            case 'year':
                echo '<form action="app/year.php" method="post">        
                                <p>Container of text:<input type="text" name="folder" /></p>
                                <p>Change from:<input type="text" name="curYear" /></p>                                                             
                                <p>Change to:<input type="text" name="corrYear" /></p>                                                                                                                             
                                <p><input type="submit" /></p>
                          </form>';
                break;
            case 'upText':
                echo '<form action="app/upText.php" method="post">        
                                <p>Delete everything till:<input type="text" name="sym" /></p>                                                                                          
                                <p><input type="submit" /></p>
                          </form>';
                break;
            case 'tagChange':
                echo '<form action="app/tagChange.php" method="post">        
                                <p>Input tag (ex: \'div\', \'i\', \'tr\',\'table\'...):<input type="text" name="tags" /></p>                                                                                          
                                <p>Input attribute (ex: \'class\', \'id\', \'align\',\'href\'...):<input type="text" name="attribute" /></p>
                                <p>Input value to change (ex: \'content\', \'text/javascript\', \'display:none\',\'menu_left\'...):<input type="text" name="value" /></p>
                                <p>Input new text:<input type="text" name="newValue" /></p>                                                                                                                                    
                                <p><input type="submit" /></p>
                          </form>';
                break;
            case 'encodeCrash':
                echo '<form action="app/encodeCrash.php" method="post">        
                                <p>will add utf-8 after "head" block</p>                                                                                                                                    
                                <p><input type="submit" /></p>
                          </form>';
                break;
        }
    }
    ?>
</div>
</body>
</html>
