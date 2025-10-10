$root = Split-Path -Parent $MyInvocation.MyCommand.Definition
$project = Resolve-Path "$root\.."
Set-Location $project
$unused = @(
"@fortawesome","accordion","boxicons","clipboard","counters","cryptofont","custom-scroll","darggable","echart","fancyuploder","fileuploads","flot.curvedlines","fullcalendar","gallery","gmaps","horizontal-menu","images-comparsion","inputtags","jquery-countdown","jquery-nice-select","jquery-steps","jquery-ui-slider","jQuerytransfer","leaflet","line-awesome","materialdesignicons","morris.js","multislider","newsticker","parsleyjs","particles.js-master","peity","popper.js","prism","prismjs","quill","simple-line-icons","sweet-alert","tabs","telephoneinput","themify","timeline","treeview"
)
$removed = @()
foreach ($p in $unused) {
    $rel = "public\dashboard\plugins\$p"
    $full = Join-Path $project $rel
    if (Test-Path $full) {
        Remove-Item -LiteralPath $full -Recurse -Force -ErrorAction SilentlyContinue
        if (-not (Test-Path $full)) { $removed += $rel; Write-Output "Removed: $rel" } else { Write-Output "Failed to remove: $rel" }
    } else {
        Write-Output "Not present: $rel"
    }
}
if ($removed.Count -gt 0 -and (Test-Path ".git")) {
    git add -A
    git commit -m "chore: remove unused dashboard plugins"
    if ($LASTEXITCODE -ne 0) { Write-Output "Git commit failed or nothing to commit" }
}
Write-Output "Done. Removed count: $($removed.Count)"
