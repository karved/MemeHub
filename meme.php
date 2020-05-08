<?php
  
  session_start();
  require("./utils.php");
  $memes = runQuery("SELECT * FROM memes ORDER BY upload_timestamp desc;");
?>
<html>
    <head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
            <link rel="stylesheet" type="text/css" href="style.css">

            <meta charset = "utf-8" /> 
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>MemeHub</title>

            <link rel = "icon" href =  "icon.jpeg"  type = "image/x-icon"> 
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            
            
    </head>
    <body>
              <div class="header1">
              
            <div class="ui borderless inverted menu ">

                    <a class="item" href="meme.html">
                      <img class="ui small image" src="pics/mh.png" >
                    </a>
                    <div>
                          <select name="category" class="ui dropdown" id="select">
                               <option value="0">Popular</option>
                              <option value="1">Trending</option>
                              <option value="2">Fresh</option>
            
                            </select>
                      </div>
                  
            
                                   <!-- <i class="chart line icon"></i>
                                    Popular <i class="dropdown icon"></i>
                                    <div class="menu">
                                            <div class="item"><i class="chart line icon"></i>Popular</div>
                                            <div class="item"><i class="chart bar icon"></i>Trending</div>
                                            <div class="item"><i class="clock outline icon"></i>Fresh</div>
                                    </div>   -->
                      
                    
                       
                        <div class="ui inverted massive menu">
                            <div class="item">
                                    <div class="ui inverted transparent icon input">
                                            <input type="text" placeholder="Search...">
                                            <i class="search icon"></i>
                                     </div>
                            </div>
                         </div>
                       
                  
                           <div class="item">
                                    <div class="ui animated fade button" tabindex="0">
                                      <div class="visible content">Upload</div>
                                    <div class="hidden content">
                                      <i class="plus square icon"></i></div>
                                    </div>
                                  </div>
                           

                                  <div class="item">
                                    <a href="logout.php">
                                    <button class="ui primary button ">Sign Out</button></a>
                                  </div>
                   
                
            </div>
              </div>
               
          

                
                <div class="ui segment">
                        <div class="ui three column very relaxed grid">
                          <div class="column">
                                <div class="ui animated list"> 
                                    <B>&nbsp;&nbsp;CATEGORIES<br><hr></B>
                                    
                                        <div class="item">
                                                <img class="ui avatar image" src="pics/funny.jpg" >
                                          <div class="content">
                                            <div class="header"><b>Funny</b></div>
                                          </div>
                                        </div>
                                        <div class="item">
                                                <img class="ui avatar image" src="pics/lame.jpg" >
                                          <div class="content">
                                            <div class="header">Lame</div>
                                          </div>
                                        </div>
                                        <div class="item">
                                                <img class="ui avatar image" src="pics/anime.jpg" >
                                          <div class="content">
                                            <div class="header">Anime</div>
                                          </div>
                                        </div>
                                        <div class="item">
                                                <img class="ui avatar image" src="pics/food.jpg">
                                                <div class="content">
                                                  <div class="header">Food</div>
                                                </div>
                                              </div>
                                            <div class="item">
                                                    <img class="ui avatar image" src="pics/sports.jpg" >
                                                    <div class="content">
                                                      <div class="header">Sports</div>
                                                    </div>
                                                  </div>
                                                  <div class="item">
                                                        <img class="ui avatar image" src="pics/gif.jpg" >
                                                        <div class="content">
                                                          <div class="header">GIF</div>
                                                        </div>
                                                      </div>
                                                      <div class="item">
                                                            <img class="ui avatar image" src="pics/superhero.jpg" >
                                                            <div class="content">
                                                              <div class="header">Superhero</div>
                                                            </div>
                                                          </div>
                                                          <div class="item">
                                                                <img class="ui avatar image" src="pics/music.jpeg">
                                                                <div class="content">
                                                                  <div class="header">Music</div>
                                                                </div>
                                                              </div>
                                                              <div class="item">
                                                                    <img class="ui avatar image" src="pics/pokemon.jpg">
                                                                    <div class="content">
                                                                      <div class="header">Pokemon</div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="item">
                                                                        <img class="ui avatar image" src="pics/nsfw.jpg" >
                                                                        <div class="content">
                                                                          <div class="header">NSFW</div>
                                                                        </div>
                                                                      </div>
                                                                      <div class="item">
                                                                            <img class="ui avatar image" src="pics/science.jpg" >
                                                                            <div class="content">
                                                                              <div class="header">Science</div>
                                                                            </div>
                                                                          </div>
                                                                          <div class="item">
                                                                                <img class="ui avatar image" src="pics/tv.jpg">
                                                                                <div class="content">
                                                                                  <div class="header">Tv</div>
                                                                                </div>
                                                                              </div>
                                                                              <div class="item">
                                                                                    <img class="ui avatar image" src="pics/dark.jpg" >
                                                                                    <div class="content">
                                                                                      <div class="header">Dark</div>
                                                                                    </div>
                                                                                  </div>
                                      </div>
                          </div>
                          <div class="column">
                            <?php foreach ($memes as $meme) {?>
                            <div>
                           <!-- <pre><?php var_dump($meme); ?></pre> -->
                             
                            <p><img class="ui large image" src="memes/<?php echo $meme["id"] . ".". $meme["image_file_ext"] ?>" ></p>
                            <div>
                              <div class="ui labeled small button">
                                    <div onclick="$.get('/like.php?meme_id=<?php echo $meme["id"]; ?>'); $next = $(this).next(); $next.text(Number($next.text()) + 1 )" class="ui large button">
                                      <i class="arrow circle up icon"></i>
                                    </div>
                                    <a  class="ui basic label">
                                      <?php echo $meme["likes"] ?>
                                    </a>
                                </div>
                                   
                                  <div class="ui labeled small button">
                                  <div onclick="$.get('/dislike.php?meme_id=<?php echo $meme["id"]; ?>'); $next = $(this).next(); $next.text(Number($next.text()) + 1 )" class="ui large button">
                                          <i class="arrow circle down icon"></i>
                                        </div>
                                        <a class="ui basic label">
                                        <?php echo $meme["dislikes"] ?>
                                        </a>
                                      </div>
                                      

                                      <div class="ui large button">
                                                    <i class="comment icon"></i>
                                                    
                                       </div>


                                       <div class="ui labeled tiny button">
                                         
                                          <div class="ui tiny button">
                                            <img class="ui avatar image" src="pics/<?php echo array("funny", "lame","anime","food","sports","gif","superhero","music","pokemon","nsfw","science","tv","dark" )[ $meme["category"]]?>.jpg">
                                          </div>
                                          <a class="ui basic label">
                                          
                                            <?php echo array("Funny", "Lame","Anime","Food","Sports","GIF","Superhero","Music","Pokemon","NSFW","Science","Tv","Dark" )[ $meme["category"]]; ?>
                                          </a>
                                        </div>
                                        <P>
                                            <div class="ui comments">
                                                <h3 class="ui dividing header">Comments</h3>
                                                <div class="comment">
                                                  
                                                  <div class="content">
                                                    
                                                  
                                                    <div class="text">
                                                      How artistic!
                                                    </div>

                                                   </div>
                                                  
                                                  </div>
                                                  <form class="ui reply form">
                                                     <div class="field">
                                                           <textarea></textarea>
                                                                   </div>
                                                    <div class="ui blue labeled submit icon button">
                                                          <i class="icon edit"></i> Add Comment
                                                                </div>
                                                      </form>
                                                </div>
                                        </P>
                                            
                                         
                              </div>
                              </div>
                              <?php } ?>
                            
                          </div>
                          <div class="column">
                              
                                <div class="c">
                                    
                                          <b>USERNAME</b>
                                            <hr>
                                            <?php 
                                            echo runQuery("SELECT username FROM users WHERE id='{$_SESSION["userId"]}'")[0]["username"];
                    
                                            ?>
                                            <hr>
                                            <br><br>
                                          <b> POSTS </b>
                                            <hr>
                                            <?php 
                                             echo runQuery("SELECT count(user_id) from memes where user_id= '{$_SESSION["userId"]}'")[0]["count(user_id)"]; 
                                             ?>
                                            <hr>


                                </div>
                                <a href="#top"><div class="ui yellow button">
                                    TOP &nbsp; &nbsp;<i class="arrow alternate circle up icon"></i>
                                </div></a>
        
                              
                          </div>   
                        </div>
                        
                </div>


                <div class="ui basic modal">                       
                  <iframe src="upload.php" width="500" height="200"></iframe>
                  </div>
       
        
            <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"> 
                </script>


                 <script> $(document).ready(function(){
                           $('#select')
                            .dropdown()
                                ;
                          });
                            </script>


                      <script>
                          $(document).ready(function(){
                            $('.comment.icon').click(function(){
                              $('.ui.comments').toggle(1000);
                            });
                          });
                          </script>

                      <script> $(document).ready(function(){
                            $('.ui.animated.fade.button').click(function(){
                            $('.ui.basic.modal')
                              .modal('show');
                              });
                          });
                            </script>
    </body>
</html> 