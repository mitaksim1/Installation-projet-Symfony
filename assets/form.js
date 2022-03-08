export default function() {   
    // alert('Hello!!!');


    // Récupère le formulaire dont la classe est .form-delete
    const formElement = document.querySelector('.form-delete');
    console.log(formElement); 

    // Ajoute l'événement submit au formulaire et appele la méthode handleSubmit
    formElement.addEventListener('submit', handleSubmit);

    // Méthode lance une demande de confirmation de suprression ou pas de la donnée
    function handleSubmit(event) {
        
        let response = confirm('Are you sure you want to delete this item?');

        if (response === false) {
            event.preventDefault();
        } else {
            return response;
        }
    }  
}
