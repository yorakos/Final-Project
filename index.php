<!DOCTYPE html>
<html lang="en">
<head>
   <title>Project</title>
    <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    </script>
    <style>
        div#tekst_sverhu_kartinki {
position: relative;
}
body {
    background-color: beige;
}
#soz {
    border-right: solid 3px rgba(0,255,0,.75);
  white-space: nowrap;
  overflow: hidden;    
  font-family: 'Source Code Pro', monospace;  
  font-size: 28px;
  color: rgba(255,255,255,.70);
  animation: animated-text 4s steps(10) 0.5s 0.5 normal both,
             animated-cursor 600ms steps(10) infinite;
}
@keyframes animated-text{
  from{width: 0;}
  to{width: 472px;}
}

/* cursor animations */

@keyframes animated-cursor{
  from{border-right-color: rgba(0,255,0,.75);}
  to{border-right-color: transparent;}
}
        </style>
        </head>
        <body>
            <div id="tekst_sverhu_kartinki">
                <img src="https://i.pinimg.com/originals/0f/91/bd/0f91bda2e9a8264fff6d2acd2e6c617f.jpg" style="object-fit:cover; width:1280px; height: 400px; font-family: Arial, Helvetica, sans-serif; margin-top:100px;">
               <div class="city">
                <h1 id="soz" style="font-family: Georgia, serif;; text-align: center; color:black; letter-spacing: -7px; font-size: 75px;"><strong>BEGINNER’S GUIDE</strong></h1>
              </div>
                </div>
        </body>
        </html>