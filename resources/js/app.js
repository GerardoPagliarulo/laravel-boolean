require('./bootstrap');
$(document).ready(function () {
    // Vars
    var container = $('.students'),    
        filter = $('#filter'),
        apiUrl = window.location.protocol + '//' + window.location.host + '/api/students/genders',
    // Init Handlebars
        source = $('#student-template').html(),
        template = Handlebars.compile(source);        
    // Select 
    filter.on('change', function () {
        var gender = $(this).val();        
        // Chiamata Ajax
        $.ajax({
            url: apiUrl,
            method: 'POST',
            data: {
                filter: gender
            }
        })
        .done(function (res) {
            if (res.response.length > 0) {
                // Reset
                container.html('');
                for (var i = 0; i < res.response.length; i++) {
                    var item =  res.response[i];
                    var content = {
                        slug: item.slug,
                        img: item.img,
                        nome: item.nome,
                        eta: item.eta,
                        assunzione: (item.genere == 'm') ? 'Assunto' : 'Assunta',
                        azienda: item.azienda,
                        ruolo: item.ruolo,
                        descrizione: item.descrizione
                    };
                    var html = template(content);
                    container.append(html);
                }
            }
            else {
                console.log(res.error);
            }
        })
        .fail(function () {
            console.log('Errore chimata API');
        });
    });
}); // <-- END Doc Ready