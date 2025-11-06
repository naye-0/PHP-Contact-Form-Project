<div class="contacts-section">
    <h2>Gespeicherte Kontakte</h2>
    
    <?php if (!empty($contacts)): ?>
        <div class="table-container">
            <table class="contacts-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Nachricht</th>
                        <th>Erstellt am</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?= htmlspecialchars($contact['id']) ?></td>
                            <td><?= htmlspecialchars($contact['name']) ?></td>
                            <td><?= htmlspecialchars($contact['email']) ?></td>
                            <td class="message-cell">
                                <div class="message-content">
                                    <?= nl2br(htmlspecialchars($contact['message'])) ?>
                                </div>
                            </td>
                            <td><?= date('d.m.Y H:i', strtotime($contact['created_at'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="no-contacts">
            <p>Noch keine Kontakte gespeichert.</p>
        </div>
    <?php endif; ?>
</div>