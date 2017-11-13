   <h1>Login</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>
     <label for="gebruikersnaam">Gebruikersnaam:</label>
     <input type="text" size="20" id="gebruikersnaam" name="gebruikersnaam"/>
     <br/>
     <label for="wachtwoord">Wachtwoord:</label>
     <input type="wachtwoord" size="20" id="wachtwoord" name="wachtwoord"/>
     <br/>
     <input type="submit" value="Login"/>
   </form>