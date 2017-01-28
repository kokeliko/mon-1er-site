    <form id="form"  action="" method="post">
     <p>
			 <label for="">Prénom</label>
			 <!-- si une valeur a été saisie, je la remets dans le champs-->
			 <input
             type="text"
              name="firstname"
              value="<?=$firstname ?>"
              placeholder="Ton prénom">
			 <!--s'il y a une erreur sur le champs je l'affiche-->
			 <span>
                 <?php if (isset($errors["firstname"]))
                 {echo $errors["firstname"];} ?>
             </span>
	  </p>

	 <p>
			 <label for="">Nom</label>
			 <!-- si une valeur a été saisie, je la remets dans le champs-->
			 <input
             type="text"
             name="name" value="<?=$name ?>"
             placeholder="Ton nom">
			 <!--s'il y a une erreur sur le champs je l'affiche-->
			 <span>
                 <?php if (isset($errors["name"]))
                  {echo $errors["name"];} ?>
              </span>
	  </p>

	  <p>
			 <label for="">Email</label>
			 <input
             type="text"
             name="email"
             value="<?=$email ?>"
             placeholder="Ton mail">
			 <span>
                <?php  if (isset($errors["email"]))
                {echo $errors["email"];} ?>
            </span>
	  </p>

	  <p>
			 <label for="">Message</label>
			 <textarea
             name="message"
             placeholder="Merci de nous écrire un petit message"><?= $message ?>
            </textarea>
			 <span>
                 <?php if (isset($errors["message"]))
                 {echo $errors["message"];} ?>
             </span>
	  </p>

	  <p>
			  <input id="button" type="submit" name="" value="Envoyer">
	  </p>
  <!--s'il n'y a pas eu d'erreurs, il y a un message dans $confirmation-->
  <!--donc on l'affiche-->
  <?php if (!empty($confirmation)) {echo $confirmation;	} ?>
 </form>

    </body>
</html>
