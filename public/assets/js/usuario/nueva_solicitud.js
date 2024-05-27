// $(document).ready(function() {
//     $('#form-consulta-cliente').submit(function(e) {
//         e.preventDefault(); // Evitar que el formulario se envíe de manera convencional

//         var identificacion = $('#identificacion').val();

//         // Realizar la solicitud AJAX al servidor
//         $.ajax({
//             url: '{{ route("nueva_solicitud_Controller") }}',
//             type: 'POST',
//             data: {
//                 _token: '{{ csrf_token() }}',
//                 identificacion: identificacion
//             },
//             success: function(response) {
//                 // Mostrar los datos del cliente en la vista
//                 $('#resultado-consulta').html(response);

//                 document.getElementById('nombre_cliente').value = response.nombre;
//                 document.getElementById('email').value = response.email;
//                 document.getElementById('numero_contacto').value = response.numero_contacto;
//                 document.getElementById('id_pais').value = response.fechanacimiento;
//             },
//             error: function(xhr, status, error) {
//                 console.error(error);
//             }
//         });
//     });
// });

// document.addEventListener('DOMContentLoaded', function() {
//     var form = document.getElementById('form-consulta-cliente');
//     form.addEventListener('submit', function(e) {
//         e.preventDefault(); // Evitar que el formulario se envíe de manera convencional
        
//         var identificacion = document.getElementById('identificacion').value;

//         // Realizar la solicitud AJAX al servidor
//         var xhr = new XMLHttpRequest();
//         xhr.open('POST', '{{ route("consultar.cliente") }}');
//         xhr.setRequestHeader('Content-Type', 'application/json');
//         xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
//         xhr.onload = function() {
//             if (xhr.status === 200) {
//                 var response = JSON.parse(xhr.responseText);
//                 if (response.cliente) {
//                     document.getElementById('nombre_cliente').value = response.cliente.nombre;
//                     document.getElementById('email').value = response.cliente.email;
//                     document.getElementById('numero_contacto').value = response.cliente.numero_contacto;
//                     document.getElementById('id_pais').value = response.cliente.id_pais;
//                 } else {
//                     alert('No se encontraron datos para el cliente con la identificación ingresada.');
//                 }
//             } else {
//                 console.error('Error en la solicitud AJAX:', xhr.statusText);
//             }
//         };
//         xhr.onerror = function() {
//             console.error('Error en la solicitud AJAX:', xhr.statusText);
//         };
//         xhr.send(JSON.stringify({ identificacion: identificacion }));
//     });
// });