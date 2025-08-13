 <style>
     body {
         /* background: linear-gradient(135deg, #232526 0%, #414345 100%); */
         /* color: #fff; */
         font-family: 'Segoe UI', Arial, sans-serif;
         margin: 0;
         height: 100vh;
         display: flex;
         align-items: center;
         justify-content: center;
     }

     .container {
         text-align: center;
         /* background: rgba(34, 34, 34, 0.85); */
         padding: 3rem 2rem;
         border-radius: 18px;
         /* box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37); */
     }

     .domain {
         font-size: 2.5rem;
         font-weight: bold;
         letter-spacing: 2px;
         margin-bottom: 1rem;
         color: #ffb347;
         text-shadow: 0 2px 8px #0006;
     }

     .coming-soon {
         font-size: 1.5rem;
         margin-bottom: 2rem;
         letter-spacing: 1px;
     }

     .loader {
         border: 6px solid grey;
         border-top: 6px solid var(--bs-yellow);
         border-radius: 50%;
         width: 48px;
         height: 48px;
         animation: spin 1s linear infinite;
         margin: 0 auto 1.5rem auto;
     }

     @keyframes spin {
         0% {
             transform: rotate(0deg);
         }

         100% {
             transform: rotate(360deg);
         }
     }

     @media (max-width: 600px) {
         .container {
             padding: 2rem 1rem;
         }

         .domain {
             font-size: 1.5rem;
         }

         .coming-soon {
             font-size: 1.1rem;
         }
     }
 </style>
 <div class="body-wrapper">
     <div class="container-fluid">
         <div class="card border-start mb-2">
             <div class="card-body text-center">
                 <div class="loader"></div>
                 <div class="coming-soon">Coming soon.<br>Stay tuned!</div>
             </div>
         </div>
     </div>
 </div>