// document.getElementById('loginForm').addEventListener('submit', function (event) {
//     event.preventDefault();

//     const email = document.getElementById('email').value;
//     const password = document.getElementById('password').value;

//     const data = { email, password };

//     fetch('pages/login.php', {
//         method: 'POST',
//         headers: { 'Content-Type': 'application/json' },
//         body: JSON.stringify(data)
//     })
//     .then(response => response.json())
//     .then(result => {
//         console.log(result);  // Affiche la réponse du serveur dans la console
        
//         if (result.success) {
//             console.log("Statut de connexion :", result.role);
//             // Rediriger vers la page utilisateur ou admin après connexion
//             window.location.href = result.role === 'admin' ? 'admin.php' : 'user.php';
//         } else {
//             document.getElementById('error-message').textContent = result.message;
//         }
//     })
//     .catch(error => {
//         console.error('Erreur :', error);
//         document.getElementById('error-message').textContent = "Erreur de connexion.";
//     });
// });

document.getElementById('loginForm').addEventListener('submit', function(event) {

    event.preventDefault(); // Empêche l'envoi normal du formulaire

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const name = document.getElementById('loginButton'); 
    

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'login.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            // document.getElementById('message').innerText = xhr.responseText;
            console.log(xhr.status)
        } else if (xhr.status === 401) {
            console.log(xhr.status)
            console.log(xhr.responseText)
            // document.getElementById('message').innerText = 'Identifiant ou mot de passe incorrect.';
        } else { console.log(xhr.status)
            // document.getElementById('message').innerText = 'Erreur lors de la connexion.';
        } 
    };

    xhr.send(`email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`);
    
});