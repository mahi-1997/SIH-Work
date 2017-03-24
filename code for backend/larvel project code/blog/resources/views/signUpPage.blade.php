<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>sihwork</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Styles -->
        
    </head>

    <body>
    
    <div>
    <form >
      <fieldset class="personalinfo">
      <legend>SIGN UP:</legend>
      <p><label for="memberID" >Member ID:</label><input type="text" name="memberID"id="memberID"/><br/></p>
      <p><label for="username" >User name:</label><input type="text" name="username"id="username"/><br/></p>
      <p><label for="password">password:</label><input type="password" name="password"  id="password"/><br/></p>
       <p><label for="repassword">Re-Enter password:</label><input type="password" name="repassword"  id="repassword"/><br/></p>
       
      <p><label for="randomUID">Random UID:</label><input type="text" name="randomUID"  id="randomUID"/><br/></p>
      
      </fieldset>
      <br/>
      <input type="submit" name="signUp" value="signUp" class="signUp" />
      </form>
      </div>
      
</body>
   
</html>
