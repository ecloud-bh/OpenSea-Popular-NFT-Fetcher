<?php
// logger.php

class Logger {
    public function logError($message) {
        // Hata mesajını LOG_FILE tanımlı dosyaya yazma
        error_log($message, 3, LOG_FILE);
    }

    // Diğer logging işlevleri...
}
