<?php

    include "../config.php";
    class reclamationC
	{
        var $recla_id;
        var $motif_id;

        function afficherReclamation(){
            $sql="SELECT  r.id , r.name , r.email , r.phone , r.subject , r.explication , motif.type from reclamation as r inner join reclamation_motif as reclaMotif on r.id=reclaMotif.recla_id inner JOIN motif on motif.id=reclaMotif.motif_id";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
				
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }

		     

        function ajouterReclamation($reclamation){
            $sql="INSERT INTO reclamation (name, email,phone,subject,explication) VALUES (:name, :email, :phone , :subject , :explication)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				   'name' =>$reclamation->getNom() , 
                   'email' =>$reclamation->getEmail(),
                   'phone' =>$reclamation->getPhone(),
                   'subject' =>$reclamation->getSubject(),
                   'explication' =>$reclamation->getExplication(),                                 
				]);			
                $this->recla_id = $db->lastInsertId();
				
              
                
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
        function supprimer_reclamation($id){
            
            $this->supprimer_reclamation_motif($id);
            
			$sql="DELETE FROM reclamation WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
                
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
        }

		function ajouterMotif($motif){
            $sql="INSERT INTO motif (type) VALUES (:type)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([                 
				   'type' =>$motif->getType() ,                             
				]);			
                $this->motif_id = $db->lastInsertId();
                $this->ajouterReclamationMotif();
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		        
	function updateReclamation($reclamation,$id){
		$sql="UPDATE reclamation SET id = :id , name=:name, email=:email , phone=:phone ,  subject=:subject , explication=:explication WHERE id=:id";
		$db = config::getConnexion();
		try{
			$query = $db->prepare($sql);
			echo"$id";
			$query->execute([
			   'id'=> $id,
			   'name' =>$reclamation->getNom() , 
			   'email' =>$reclamation->getEmail(),
			   'phone' =>$reclamation->getPhone(),
			   'subject' =>$reclamation->getSubject(),
			   'explication' =>$reclamation->getExplication(),                                 
			]);			
			header("Location: afficherListeReclamation.php");

		  
			
		}
		catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
		}			
	}


        function supprimer_reclamation_motif($id){
            
			$sql=" DELETE FROM `reclamation_motif` WHERE recla_id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
        }

	

	function supprimer_motif($id){
		
		$sql=" DELETE FROM `motif` WHERE id=:id";
		$db = config::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':id', $id);
		try{
			$req->execute();
		}
		catch(Exception $e){
			die('Erreur:'. $e->getMeesage());
		}
	}


  

		
	function ajouterReclamationMotif(){
           
          

		$sql="INSERT INTO reclamation_motif (motif_id, recla_id) VALUES ( :motif_id , :recla_id)";
		$db = config::getConnexion();

		try{
			$query = $db->prepare($sql);
			$query->execute([                 
			   'motif_id' =>$this->motif_id, 
			   'recla_id' =>$this->recla_id                        
			]);			
			
		}
		catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
		}			
	}



      
}

?>