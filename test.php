<!DOCTYPE html>
<html>
<head>
    <style>
         .parent{
            background-color: aqua;
            height: 500vh;
             position: relative;
        }
        
        .child-one{
           background-color:  lightcoral;
         position: sticky;
            top: 0;
            right: 0;
        }
        
        .child-two{
           background-color:  yellow;
        }
        
        .child-three{
            background-color: lightgreen;
        }
        
       
    </style>
    </head>
    <body>
        <div class="parent">Parent
        <div class="child-one child">This is Section 1</div>
        <div class="child-two child">This is Section 2</div>
        <div class="child-three child">This is Section 3</div>
        </div>
        
    </body>
</html>