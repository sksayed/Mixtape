 <?php
                    $sl=0;
                    foreach(glob('uploads/*', GLOB_ONLYDIR) as $dir) {
                        $dirname = basename($dir);
                        $a=scandir($dir);
                     echo "<button class='accordion'>".$sl.") ".$dirname."</button>
                        <div class='panel' id='panel'><ul class='list'>";
                         for ($i=2; $i<count($a) ; $i++) 
                         {   
                            if($i==2){
                            echo "<li class='current-song'><a class='song".$i."' id='song".$i."' href='uploads/".$dirname."/".$a[$i]."'>".$a[$i]."</a></li><br>";
                            }
                            else{
                             echo "<li><a class='song".$i."' id='song".$i."' href='uploads/".$dirname."/".$a[$i]."'>".$a[$i]."</a></li><br>";   
                            }
                         }
                        echo "</div>";
                        $sl=$sl+1;
                    }
                    ?>