# Istruzioni Rapide - FormSubmit (PIÙ SEMPLICE)

## Opzione A: FormSubmit (CONSIGLIATO - Più semplice)

### Passo 1: Prima Configurazione
1. Apri `docs/contact.html`
2. Cerca la riga del form:
   ```html
   <form id="contactForm">
   ```
3. Sostituiscila con:
   ```html
   <form action="https://formsubmit.co/jordanietane2@gmail.com" method="POST">
   ```

### Passo 2: Aggiungi campi nascosti
Subito dopo `<form action...`, aggiungi:
```html
<input type="hidden" name="_subject" value="Nuovo messaggio dal sito SICMI Sarl">
<input type="hidden" name="_captcha" value="false">
<input type="hidden" name="_template" value="table">
<input type="text" name="_honey" style="display:none">
```

### Passo 3: Rimuovi/Sostituisci lo script JavaScript
Alla fine del file, rimuovi tutto lo script EmailJS e lascia solo:
```html
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
```

### Passo 4: Test
1. La prima volta che usi FormSubmit, dovrai confermare l'email
2. Vai su https://ednajm.github.io/smic/contact.html
3. Compila e invia il form
4. Controlla l'email jordanietane2@gmail.com
5. Clicca sul link di conferma che riceverai
6. Da quel momento in poi, tutti i messaggi arriveranno automaticamente!

## Vantaggi FormSubmit:
- ✅ **ZERO configurazione** (solo sostituisci email)
- ✅ Completamente gratuito e illimitato
- ✅ Nessun account da creare
- ✅ Funziona subito dopo la conferma email
- ✅ Anti-spam integrato

## File Pronto all'Uso
Ho già creato `contact-formsubmit.html` con FormSubmit configurato.
Puoi copiarlo su `contact.html`:

```bash
cp docs/contact-formsubmit.html docs/contact.html
```

Oppure usa il file contact.html che ha già EmailJS (richiede più configurazione ma più personalizzabile).

## Per i Form Preventivo
Nei file `service-*.html`, trova:
```html
<form id="preventivoForm">
```

Sostituisci con:
```html
<form action="https://formsubmit.co/jordanietane2@gmail.com" method="POST">
    <input type="hidden" name="_subject" value="Richiesta Preventivo SICMI Sarl">
    <input type="hidden" name="_captcha" value="false">
    <input type="hidden" name="_template" value="table">
    <input type="text" name="_honey" style="display:none">
```

E rimuovi lo script JavaScript alla fine.

## Quale scegliere?

### Usa **FormSubmit** se:
- Vuoi qualcosa di semplice e veloce ✅
- Non hai esperienza con API
- Non hai bisogno di personalizzazione avanzata

### Usa **EmailJS** se:
- Vuoi più controllo sul design delle email
- Vuoi personalizzare completamente i template
- Non ti dispiace configurare account e API keys
