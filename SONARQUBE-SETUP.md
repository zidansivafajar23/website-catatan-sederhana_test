# 📊 SonarQube Code Coverage Setup

## ✅ Perubahan yang Telah Dilakukan

### 1. **phpunit.xml** - Konfigurasi Coverage Report
```xml
<coverage>
    <report>
        <clover outputFile="coverage/clover.xml"/>
        <html outputDirectory="coverage/html"/>
    </report>
</coverage>
```
- ✅ Generate Clover XML format untuk SonarQube
- ✅ Generate HTML report untuk review lokal

### 2. **sonar-project.properties** - Konfigurasi SonarQube
```properties
sonar.sources=app,database,routes
sonar.tests=tests
sonar.exclusions=vendor/**,storage/**,bootstrap/cache/**,public/**
sonar.php.coverage.reportPaths=coverage/clover.xml
```
- ✅ Define source code directories
- ✅ Exclude vendor dan generated files
- ✅ **Penting**: Menunjuk ke coverage report path

### 3. **CI-Pipeline.yml** - Generate & Upload Coverage
**PHPUnit Job:**
- ✅ Generate coverage report (hanya untuk PHP 8.3 + Feature tests)
- ✅ Upload coverage artifact

**SonarQube Job:**
- ✅ Download coverage report dari artifact
- ✅ SonarQube scan dengan coverage data

### 4. **build.yml** - Standalone Build dengan Coverage
- ✅ Tambah build-and-test job
- ✅ Generate coverage sebelum SonarQube scan
- ✅ Pastikan coverage selalu tersedia

## 🎯 Hasil yang Diharapkan

Setelah push perubahan ini:

1. **Coverage on New Code**: **> 0.0%** ✅
   - SonarQube akan menerima coverage data
   - Akan menampilkan persentase code coverage

2. **Security Issues**: **Resolved** ✅
   - Full SHA hash untuk GitHub Actions
   - Mencegah supply chain attacks

## 🚀 Cara Menjalankan Lokal

### Generate Coverage Report
```bash
# Install dependencies
composer install

# Setup environment
cp .env.example .env
php artisan key:generate

# Run database
php artisan migrate

# Generate coverage
./vendor/bin/phpunit --coverage-clover=coverage/clover.xml --coverage-html=coverage/html

# Lihat HTML report
# Buka: coverage/html/index.html di browser
```

### Cek Coverage Lokal (Terminal)
```bash
php artisan test --coverage
```

## 📝 Notes

- Coverage hanya di-generate sekali (PHP 8.3 + Feature tests) untuk efisiensi
- Coverage artifact akan dihapus setelah 1 hari (retention-days: 1)
- SonarQube akan menganalisis coverage untuk semua kode (Unit + Feature)

## 🔍 Troubleshooting

### Coverage masih 0%?
1. Cek GitHub Actions logs → PHPUnit job → "Generate Coverage Report"
2. Pastikan `coverage/clover.xml` ter-generate
3. Cek SonarQube job → "Download Coverage Report" → "List Coverage Files"
4. Pastikan file clover.xml ada di SonarQube scanner

### Coverage tidak akurat?
- Pastikan semua tests berjalan dengan sukses
- Cek `phpunit.xml` source include/exclude
- Verifikasi `sonar-project.properties` sources configuration

## 👥 Tim DevOps
- Rafif Purnomo
- Dana
- Zidan
- Amar
- Irji
