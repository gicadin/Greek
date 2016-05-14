"# Greek" 


ACIT 2520 Project

Topic: Greek Restaurant

Group: Team 8 
Members:
  Andrei Hristea A00742675
  Wuwei Xie (Jason)  A00941716 

Completion: 100%

Setup Instruction:  
    
    1.Run the php file called "InitDatabase.php" to instantialize the database. Blank white page after it loads is a sign of success. 
    
    2. Copy Greek folder into root directory
    
    3. Use "Greek/index.php" as the entry point
    
    4. Greek/admin/ as the entry point to the administrator dashboard
    
    5. The account for both administrator and user is admin and password is admin (lowercase)

Things that went well:
  
  Tried to imitate rest architecture in index.php

  Used MV (and a little controller here and there) framework. All the views are completly separate from the rest of the project. 
  
Things need to be done in the future:

  Some of the early controllers were public methods. I realized later in the project that they could be private. 

  Also the loading frame is very large. I should have split the loading frames into two separate frames and just load the content. So far im also loading a submenu, that should just be updated to add or remove part of it, but not the whole submenu.
  
  There might be a computationally smarter way of implementing shopping cart with slightly less looping. 

