<?php
require_once( 'modules/session_api.php' );
require_once( 'modules/logging_api.php' );
/**
 * Visiteur_API pour traiter tout ce qui concerne un visiteur
 * - un visiteur peut etre nouveau
 * - un visiteur peut etre actif s'il a interroge le site depuis moins d'une heure ou inactif
 * - un visiteur peut choisir un pseudo,changer de pseudo ou rester anonyme
 */

/**
 * Est-ce que le joueur est nouveau ?
 * on memorise qu'il est 'dejavu' dans sa session
 */
function estJoueurNouveau(){

    $dejavu = session_get( 'dejavu' );
    
    if (!isset($dejavu)){
        log_event( LOG_SESSION, 'estJoueurNouveau() ? oui' );        
        session_set( 'dejavu', 'oui' );
        
        return true;
     }
     return false;
}

/**
* est-ce que le joueur est actif ?
* on memorise l'heure du test et si entre 2 horaires il y a plus d'une heure on a un joueur qui etait
* inactif. Un nouveau joueur est considere comme actif.
*/
function estJoueurActif(){

    $maintenant=date_timestamp_get();
    $precedentClic=session_get_int('precedentClic');
    session_set('precedentClic', $maintenant);
    
    if ( isset($precedentClic) && ($maintenant > $precedentClic+3600) ){
    
        return false;
	}
	return true;
}


/**
* affiche un petit formulaire pour saisir un pseudo
* a utiliser quand le visiteur est nouveau
*/
function afficheDemandePseudo(){

    //  TODO : mise en forme 
    ?>
	    <form method="post" action="index.php">
	    <br/><label for="pseudo">Choisissez un pseudo</label>
	    <input type="text" name="pseudo" pattern="[ 0-9a-zA-ZÀ-ÿ]*" title="(uniquement des chiffres ou des lettres)" value="anonyme" >
	    <br/><input type="submit" value="Envoyer">
	    </form>
    <?php
}

/**
* affiche le pseudo et un bouton de deconnexion
* a utiliser dans l'entete par exemple
*/
function affichePseudo(){

    $pseudo = session_get( 'pseudo' );
    if (!isset($pseudo) && isset($_POST['pseudo'])){
	    $pseudo = $_POST['pseudo'];
	    session_set( 'pseudo', $pseudo );
    }
    //  TODO : mise en forme 
    ?>   
    <div class="btn-group">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?=$pseudo?></button>
            <ul class="dropdown-menu">
              <!-- <li><a class="dropdown-item" href="#">Action</a></li>-->
              <li><a class="dropdown-item" href="?deconnexion=">Déconnexion</a></li>
            </ul>
          </div>
       </div>
    
    <?php
}


?>
