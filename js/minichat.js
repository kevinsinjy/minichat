    //Requête Ajax pour rafraichir automatiquement toute les 2 sec
    setInterval(function () {
        $('#refresh').load('/mini_chat/pdo/message.php').fadeIn("slow");     
    } 
    , 2000);

    //Requête Ajax pour signaler que le message s'envoi ou non
    function storeMessage(event, form) {
        let $form = $(form);
        let $button = $form.find("button");
        if(!$button.data('originalText')) {
            $button.data('originalText', $button.text())
        }
        let $originalButtonText = $button.data('originalText');

        event.preventDefault();

        let requestData = $form.serialize();

        $.post({
            url: $form.attr( 'action' ),
            data: requestData,
            success: function(error) {
                if(error) {
                    console.log("storeMessage Error", error);
                    $button.text("❌");
                }
                else {
                    $button.text("✔");
                }
                setTimeout(function () {
                    $button.text($originalButtonText);
                }, 1000);
            }
        });

    document.getElementById('message').value = "";
    }
