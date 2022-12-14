$("#btn0").click(function(){
    alert("Mensaje con Alert");    
});

//ejemplo básico
$("#btn1").click(function(){
    Swal.fire('Ejemplo basico de Sweet Alert 2');
});	

//con opción de TYPE  //tipos de popups: error, success, warning, info, question
$("#btn2").click(function(){
    /*Swal.fire({
        //error
        type: 'error',
        title: 'Error',
        text: '¡Algo salió mal!',        
    });*/
    Swal.fire({        
        type: 'success',
        title: 'Éxito',
        text: '¡Perfecto!',        
    });
});	

//Con imagen de fondo
$("#btn3").click(function(){
    Swal.fire({
        imageUrl: 'img/html5.png',
        imageHeight: 412,
        imageAlt: 'A tall image'
    });
});	

//Con posicionamiento - por defecto es centrada
//Posibles valores: 'top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', or 'bottom-end'.

$("#btn4").click(function(){
    Swal.fire({
      position: 'top-start', //permite "top-end"
      type: 'success',
      title: 'Tú trabajo ha sido grabado',
      showConfirmButton: false,
      timer: 2000 //el tiempo que dura el mensaje en ms
    });    
});

//Animada tiene que ir en la propiedad popup
// popup: 'animated nombreDelEfecto'
$("#btn5").click(function(){
    Swal.fire({
        title: 'Custom animation with Animate.css',
        animation: false,
        customClass: {
        popup: 'animated bounceIn'
    }
    });
});	

//cambiando el background
$("#btn6").click(function(){
    Swal.fire({
        title: 'Personalizando ancho, padding y background.',
        width: 600,
        padding: '5em',
        background: '#fff url(/img/imagen_600x500.png)', //es el fondo de la caja de dialogo
        backdrop: `
        rgba(5, 5, 25, 0.4)
        url("https://sweetalert2.github.io/images/nyan-cat.gif")
        center left
        no-repeat
        `
    });
});

//Progresivo
$("#btn7").click(function(){
    Swal.mixin({
      input: 'text', //puede ser text, number, email, password, textarea, select, radio
      confirmButtonText: 'Siguiente &rarr;',
      showCancelButton: true,
      progressSteps: ['1', '2', '3']
    }).queue([
      {
        title: 'Pregunta 1',
        text: '¿Color favorito?'
      },
      {
        title: 'Pregunta 2',
        text: '¿Animal favorito?'
      },
        {
        title: 'Pregunta 3',
        text: '¿País de origen?'
      }      
    ]).then((result) => {
      if (result.value) {
        Swal.fire({
          title: '¡Completado!',
          html:
            'Tus respuestas: <pre><code>' +
              JSON.stringify(result.value) +
            '</code></pre>',
          confirmButtonText: 'Ok'
        })
      }
    });    
});

//con TIMER
let timerInterval
$("#btn8").click(function(){
    Swal.fire({
      title: 'Auto close alert!',
      html: 'I will close in <strong></strong> seconds.',
      timer: 2000, //tiempo del timer
      onBeforeOpen: () => {
        Swal.showLoading()
        timerInterval = setInterval(() => {
          Swal.getContent().querySelector('strong')
            .textContent = Swal.getTimerLeft()
        }, 100)
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.timer
      ) {
        console.log('I was closed by the timer')
      }
    });    
});
