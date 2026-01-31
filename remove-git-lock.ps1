# Скрипт для удаления Git lock файлов
# Использование: .\remove-git-lock.ps1

$lockFiles = @(
    ".git\index.lock",
    ".git\config.lock",
    ".git\HEAD.lock"
)

# Проверяем наличие lock файлов
Write-Host "Проверка наличия Git lock файлов..." -ForegroundColor Yellow

$found = $false
foreach ($lockFile in $lockFiles) {
    if (Test-Path $lockFile) {
        Write-Host "Найден: $lockFile" -ForegroundColor Red
        $found = $true
    }
}

# Проверяем lock файлы в refs
$refsLockFiles = Get-ChildItem -Path ".git\refs" -Filter "*.lock" -Recurse -ErrorAction SilentlyContinue
if ($refsLockFiles) {
    foreach ($file in $refsLockFiles) {
        Write-Host "Найден: $($file.FullName)" -ForegroundColor Red
        $found = $true
    }
}

if (-not $found) {
    Write-Host "Lock файлы не найдены!" -ForegroundColor Green
    exit 0
}

Write-Host "`nВНИМАНИЕ: Удаление lock файлов может привести к потере незавершенных операций Git!" -ForegroundColor Yellow
$confirm = Read-Host "Продолжить удаление? (y/n)"

if ($confirm -eq "y" -or $confirm -eq "Y") {
    # Удаляем основные lock файлы
    foreach ($lockFile in $lockFiles) {
        if (Test-Path $lockFile) {
            Remove-Item $lockFile -Force
            Write-Host "Удален: $lockFile" -ForegroundColor Green
        }
    }
    
    # Удаляем lock файлы в refs
    if ($refsLockFiles) {
        foreach ($file in $refsLockFiles) {
            Remove-Item $file.FullName -Force
            Write-Host "Удален: $($file.FullName)" -ForegroundColor Green
        }
    }
    
    Write-Host "`nВсе lock файлы удалены!" -ForegroundColor Green
    Write-Host "Теперь можно выполнять Git команды." -ForegroundColor Green
} else {
    Write-Host "Операция отменена." -ForegroundColor Yellow
}
