<div class="container">
    <h2>Kontaktformular</h2>

    <?php if (isset($errors) && !empty($errors)): ?>
        <div class="error-messages">
            <?php foreach ($errors as $error): ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($successMessage)): ?>
        <div class="success-message"><?= htmlspecialchars($successMessage) ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= isset($name) ? htmlspecialchars($name) : '' ?>">
        </div>
        
        <div class="form-group">
            <label for="email">E-Mail:</label>
            <input type="email" id="email" name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
        </div>
        
        <div class="form-group">
            <label for="message">Nachricht:</label>
            <textarea id="message" name="message" placeholder="Schreibe hier deine Nachricht..."><?= isset($message) ? htmlspecialchars($message) : '' ?></textarea>
        </div>
        
        <button type="submit" class="submit-btn">Nachricht senden</button>
    </form>
</div>