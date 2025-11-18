# SOLUZIONE EMAIL FORM - SICMI

## ⚠️ PROBLEMA ATTUALE
FormSubmit.co è down (Error 521). Il form attualmente usa un **mailto temporaneo** che apre il client email del visitatore.

## 🚀 SOLUZIONI PERMANENTI (in ordine di semplicità)

### OPZIONE 1: Formspree (CONSIGLIATO - Gratis e Affidabile)

**Vantaggi**: Gratis 50 form/mese, nessun server necessario, molto affidabile

**Setup (5 minuti)**:
1. Vai su https://formspree.io/
2. Crea account gratuito
3. Clicca "New Form"
4. Email: `jordanietane2@gmail.com`
5. Copia il Form ID (es: `xpwzrglv`)
6. Nel file `docs/contact.html`, cambia la linea del form:
   ```html
   <form id="contactForm" onsubmit="return sendEmail(event)">
   ```
   con:
   ```html
   <form action="https://formspree.io/f/IL_TUO_FORM_ID" method="POST">
   ```

### OPZIONE 2: EmailJS (Più Complesso ma Personalizzabile)

**Vantaggi**: 200 email/mese, template personalizzabili

Vedi il file `EMAILJS_SETUP.md` per le istruzioni complete.

### OPZIONE 3: Backend PHP (Se hai un hosting con PHP)

**Se hai un hosting con PHP/cPanel**:

1. Carica il file `contact-handler.php` sul tuo server
2. Nel file `docs/contact.html`, cambia:
   ```html
   <form id="contactForm" onsubmit="return sendEmail(event)">
   ```
   con:
   ```html
   <form action="https://tuodominio.com/contact-handler.php" method="POST">
   <input type="text" name="_honey" style="display:none">
   ```

### OPZIONE 4: Google Forms (Più Semplice ma Meno Professionale)

1. Crea un Google Form
2. Ottieni il link
3. Incorporalo nella pagina o reindirizza al form

### OPZIONE 5: Netlify Forms (Se usi Netlify per hosting)

1. Aggiungi `netlify` attributo al form:
   ```html
   <form name="contact" method="POST" data-netlify="true">
   ```
2. Deploy su Netlify
3. Le email arriveranno automaticamente

## 🔧 QUICK FIX IMMEDIATO

Per attivare **subito** Formspree (la soluzione migliore):

```bash
cd /home/user/sicmi-main/docs
```

Modifica `contact.html`, cerca questa riga (circa linea 109):
```html
<form id="contactForm" onsubmit="return sendEmail(event)">
```

Sostituiscila con:
```html
<form action="https://formspree.io/f/mnqlgqbd" method="POST">
<input type="hidden" name="_subject" value="Nuovo messaggio dal sito SICMI">
```

E rimuovi lo script JavaScript alla fine (linee 208-230).

Poi fai push:
```bash
git add docs/contact.html
git commit -m "Switch to Formspree for email delivery"
git push origin main
```

## 📧 TEST

Dopo aver implementato una soluzione, testa:
1. Vai su https://ednajm.github.io/smic/contact.html
2. Compila il form
3. Invia
4. Controlla l'email jordanietane2@gmail.com

## 🆘 SUPPORTO

Se hai problemi:
- FormSubmit down: usa Formspree
- Nessun hosting PHP: usa Formspree o EmailJS
- Budget zero: usa mailto (soluzione attuale) o Formspree gratis

**RACCOMANDAZIONE FINALE**: Usa Formspree - è gratuito, affidabile e funziona subito!
