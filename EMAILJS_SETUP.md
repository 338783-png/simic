# Configurazione EmailJS per SICMI Sarl

## Passo 1: Crea Account EmailJS
1. Vai su https://www.emailjs.com/
2. Clicca su "Sign Up" e crea un account gratuito
3. Verifica la tua email

## Passo 2: Collega il tuo Account Gmail
1. Nel dashboard EmailJS, vai su "Email Services"
2. Clicca "Add New Service"
3. Seleziona "Gmail"
4. Clicca "Connect Account" e autorizza con l'email: **jordanietane2@gmail.com**
5. Dai un nome al servizio (es: "gmail_sicmi")
6. Copia il **Service ID** (es: service_abc123)

## Passo 3: Crea un Template Email
1. Nel dashboard, vai su "Email Templates"
2. Clicca "Create New Template"
3. Usa questo template:

### Subject (Oggetto):
```
Nuovo messaggio dal sito SICMI: {{subject}}
```

### Content (Corpo email):
```
Hai ricevuto un nuovo messaggio dal sito web SICMI Sarl:

-----------------------------------
DETTAGLI CONTATTO
-----------------------------------
Nome: {{from_name}}
Email: {{reply_to}}
Telefono: {{phone}}
Oggetto: {{subject}}

-----------------------------------
MESSAGGIO
-----------------------------------
{{message}}

-----------------------------------
Questo messaggio è stato inviato automaticamente dal form di contatto del sito web SICMI Sarl.
Per rispondere, usa l'indirizzo email: {{reply_to}}
```

4. **IMPORTANTE**: Nella sezione "Settings" del template:
   - To Email: `jordanietane2@gmail.com`
   - From Name: `SICMI Website`
   - Reply To: `{{reply_to}}`

5. Salva il template e copia il **Template ID** (es: template_xyz789)

## Passo 4: Ottieni la Public Key
1. Nel dashboard, vai su "Account" → "General"
2. Trova la sezione "API Keys"
3. Copia la **Public Key** (es: user_abc123xyz)

## Passo 5: Aggiorna il Codice
Apri il file `docs/contact.html` e cerca queste righe (circa linea 210):

```javascript
const EMAILJS_PUBLIC_KEY = 'YOUR_PUBLIC_KEY';
const EMAILJS_SERVICE_ID = 'YOUR_SERVICE_ID';
const EMAILJS_TEMPLATE_ID = 'YOUR_TEMPLATE_ID';
```

Sostituiscile con i tuoi valori reali:
```javascript
const EMAILJS_PUBLIC_KEY = 'user_abc123xyz'; // La tua Public Key
const EMAILJS_SERVICE_ID = 'service_abc123'; // Il tuo Service ID
const EMAILJS_TEMPLATE_ID = 'template_xyz789'; // Il tuo Template ID
```

## Passo 6: Applica lo Stesso Sistema ai Form Preventivo

Per i form preventivo nelle pagine `service-*.html`, cerca lo script alla fine del file e sostituisci con:

```javascript
// Inizializza EmailJS
emailjs.init('YOUR_PUBLIC_KEY'); // La stessa Public Key

document.getElementById('preventivoForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Invio in corso...';
    
    const templateParams = {
        from_name: this.querySelector('[name="name"]').value || document.querySelector('input[type="text"]').value,
        reply_to: this.querySelector('[name="email"]').value || document.querySelector('input[type="email"]').value,
        phone: this.querySelector('[name="phone"]').value || document.querySelector('input[type="tel"]').value,
        project_type: document.getElementById('projectType').value,
        area: document.getElementById('area').value || 'Non specificato',
        budget: this.querySelector('select[name="budget"]').value || 'Non specificato',
        timeline: this.querySelector('select[name="timeline"]').value || 'Non specificato',
        message: this.querySelector('textarea').value,
        to_email: 'jordanietane2@gmail.com',
        subject: 'Richiesta Preventivo - ' + document.getElementById('projectType').value
    };
    
    emailjs.send('YOUR_SERVICE_ID', 'YOUR_TEMPLATE_ID', templateParams)
        .then(function(response) {
            document.getElementById('successMessage').style.display = 'block';
            document.getElementById('preventivoForm').reset();
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Richiedi Preventivo Gratuito';
            window.scrollTo({top: 0, behavior: 'smooth'});
        }, function(error) {
            alert('Errore nell\'invio. Contattaci direttamente: sicmisarl@gmail.com');
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Richiedi Preventivo Gratuito';
        });
});
```

## Passo 7: Test
1. Salva tutte le modifiche
2. Fai commit e push su GitHub
3. Vai sul sito https://ednajm.github.io/smic/contact.html
4. Compila il form e invia
5. Controlla l'email jordanietane2@gmail.com per verificare la ricezione

## Limiti Account Gratuito EmailJS
- 200 email al mese gratuite
- Se necessiti di più, puoi upgrade a piano a pagamento

## Alternative Gratuite
Se EmailJS non funziona, puoi usare:
1. **Formspree**: https://formspree.io/ (50 form/mese gratis)
2. **Getform**: https://getform.io/ (50 form/mese gratis)
3. **FormSubmit**: https://formsubmit.co/ (completamente gratuito, più semplice)

## Note Importanti
- **NON committare mai le tue chiavi API su GitHub pubblico** (EmailJS public key è ok perché è pubblica)
- Testa sempre prima in locale
- Verifica che le email non finiscano in spam
