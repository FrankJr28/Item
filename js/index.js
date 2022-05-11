//https://www.gstatic.com/firebasejs/9.0.0/firebase-app.js
//https://www.gstatic.com/firebasejs/9.0.0/firebase-auth.js

import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.8/firebase-app.js";

import { getAuth, onAuthStateChanged, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/9.6.8/firebase-auth.js";

//import { getFirestore, collection } from "firebase/firestore";

const firebaseApp = initializeApp({
    apiKey: "AIzaSyBXJhSgEi4KHXaH2Lj6K6aHsRdg74Tz5V0",
    authDomain: "loginsocialmediaitem.firebaseapp.com",
    projectId: "loginsocialmediaitem",
    storageBucket: "loginsocialmediaitem.appspot.com",
    messagingSenderId: "995973847604",
    appId: "1:995973847604:web:3a7fc15a02599f78304861",
    measurementId: "G-DL7KM5VL4B"
});

// Initialize Firebase
//const app = initializeApp(firebaseConfig);
//const analytics = getAnalytics(app);


const auth = getAuth(firebaseApp);

document.getElementById('btnLoginGoogle').addEventListener('click', () => {
    console.log("google clicked");

    const provider = new GoogleAuthProvider();
    console.log("afterProvideer");
    /**/
    signInWithPopup(auth, provider)
        .then((result) => {
            // This gives you a Google Access Token. You can use it to access the Google API.
            const credential = GoogleAuthProvider.credentialFromResult(result);
            const token = credential.accessToken;
            // The signed-in user info.
            const user = result.user;
            //console.log(user);
            console.log(user.providerData[0].displayName);
            console.log(user.providerData[0].email);
            console.log(user.providerData[0].photoURL);

            /**/
            $.post("controladores/login.usuario.php?op=accesosocial", { usu_correo: result.user.providerData[0].email, usu_nombre: result.user.providerData[0].displayName, link: result.user.providerData[0].photoURL }, function(data) {

                console.log(data);

                if (data == "redirect") {

                    window.location = "index.php?pagina=solicitar";

                } else {
                    /*          Devuelve algo el modelo             */

                    if (data == "invalid domain") {

                        //alert("El correo debe ser institucional");

                        Swal.fire({
                            icon: 'error',
                            title: 'Correo Inválido',
                            text: 'Debes utilizar un correo institucional!',
                            //footer: '<a href="">Why do I have this issue?</a>'
                        })

                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Ocurrió un error',
                            text: 'Contacte al administrador',
                            //footer: '<a href="">Why do I have this issue?</a>'
                        })

                    }

                }

                //console.log("el error" + data);

            });
            /**/

            // ...
        }).catch((error) => {

            // Handle Errors here.
            const errorCode = error.code;

            const errorMessage = error.message;
            // The email of the user's account used.

            const email = error.email;
            // The AuthCredential type that was used.

            const credential = GoogleAuthProvider.credentialFromError(error);
            // ...

        });
    /**/

});

//const db = getFirestore(firebaseApp);

//const todosCol = collection();

onAuthStateChanged(auth, user => {
    if (user != null) {
        console.log("logged in");
    } else {
        console.log("No user");
    }
})