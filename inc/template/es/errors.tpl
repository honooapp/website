{assign var=errorTranslations value=[
	"error-saving-db" => "Impossibile salvare il record",
	"error-reading-db" => "Impossibile leggere i dati",
	"error-saving-image" => "Impossibile salvare l'immagine",
	"error-image-mime" => "Il tipo MIME di questa immagine non è valido",
	"error-uploading-image" => "Impossibile caricare l'immagine",
	"invalid-captcha" => "Codice di sicurezza non valido",
	"image-missing" => "Campo 'immagine' vuoto",
	"description-too-long" => "La descrizione è troppo lunga",
	"description-missing" => "campo 'descrizione' vuoto",
	"limit-reached" => "Limite raggiunto",
	"error-reading-num" => "Impossibile leggere il numero di pagine",
	"page-not-valid" => "Pagina non valida",
	"action-not-valid" => "Azione non valida",
	"error-login" => "Impossibile effettuare il login"
]}

{include file="../errors_output.tpl" translation = $errorTranslations codes = $errors}

