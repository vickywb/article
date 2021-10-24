<style>
  body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  }
  
  html {
    box-sizing: border-box;
  }
  
  *, *:before, *:after {
    box-sizing: inherit;
  }
  
  .column {
    float: left;
    width: 33.3%;
    margin-bottom: 16px;
    padding: 0 8px;
  }
  
  .card {
    box-shadow: 0 10px 50px 0 rgba(0, 0, 0, 0.3);
    margin: 8px;
  }
  
  .about-section {
    padding: 50px;
    text-align: center;
    background-color: lightblue;
    color: black;
  }
  
  .container::after, .row::after {
    content: "";
    clear: both;
    display: table;
  }
  
  .title {
    color: grey;
  }
  
  .button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
  }
  
  .button:hover {
    background-color: #555;
  }
  
  @media screen and (max-width: 650px) {
    .column {
      width: 100%;
      display: block;
    }
  
  .bg-color {
    background-color: aqua;
  }
  
  }
  
  
  </style>
    <div class="about-section">
      <h1>About Us Page</h1>
      <p>Some text about who we are and what we do.</p>
      <p>Resize the browser window to see that this page is responsive by the way.</p>
    </div>
     
  <div class="bg-color">
    <div class="card-group mt-3" style="text-align: center">
      <div class="column">
           <div class="card">
               <img src="{{ asset('images/kunkka.png') }}" alt="Image" class="img-fluid w-10 rounded-circle mx-auto mb-4" style="height: 200px;  box-shadow: 0px 10px 50px 0 rgba(0, 0, 0, 0.2);" width="200px;" >
               <div class="card-body">
                   <div class="container">
                       <h2>Jane Doe</h2>
                       <p class="title">Guru Olahraga</p>
                       <p>"Some text that describes me lorem ipsum ipsum lorem"</p>
                     </div>
               </div>
           </div>
       </div>
       <div class="column">
           <div class="card">
               <img src="{{ asset('images/kunkka.png') }}" alt="Image" class="img-fluid w-10 rounded-circle mx-auto mb-4" style="height: 200px" width="200px">
               <div class="card-body">
                   <div class="container">
                       <h2>Jane Doe</h2>
                       <p class="title">Guru Bahasa Indonesia</p>
                       <p>"Some text that describes me lorem ipsum ipsum lorem"</p>
                     </div>
               </div>
           </div>
       </div>
       <div class="column">
           <div class="card">
               <img src="{{ asset('images/kunkka.png') }}" alt="Image" class="img-fluid rounded-circle mx-auto mb-4" style="height: 200px" width="200px">
               <div class="card-body">
                   <div class="container">
                       <h2>Jane Doe</h2>
                       <p class="title">Guru Matematika</p>
                       <p>"Some text that describes me lorem ipsum ipsum lorem"</p>
                     </div>
               </div>
           </div>
       </div>
     </div>
  </div>
  
