// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
import { getMessaging, getToken } from "firebase/messaging";

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyB-hxyEMp41IqFOB8jsoabgdYH31jYTA7I",
    authDomain: "gsg-classroom.firebaseapp.com",
    projectId: "gsg-classroom",
    storageBucket: "gsg-classroom.appspot.com",
    messagingSenderId: "1009956087555",
    appId: "1:1009956087555:web:626812fb3e8787aa68ab36",
    measurementId: "G-1059XE8T4N"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);


// Initialize Firebase Cloud Messaging and get a reference to the service
const messaging = getMessaging(app);

// Add the public key generated from the console here.
getToken(messaging, { vapidKey: "BJSjqYQh4TTdKsvQVHQ9F-uXiMkdeFhrzlYfoEvosJBJXCpLci_q3KN7pl7M4s_g9mTkpJzaxVltDuaZ9m897Ok" })
    .then((currentToken) => {
        console.log(currentToken);
        if (currentToken) {
            $.post('api/devices', {
                token: currentToken
            }, () => { })
        } else {
            // Show permission request UI
            console.log('No registration token available. Request permission to generate one.');
            // ...
        }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
        // ...
    });