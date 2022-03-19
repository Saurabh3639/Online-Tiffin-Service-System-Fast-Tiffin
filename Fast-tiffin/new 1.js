<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
    document.location = delUrl;
  }
}
</script>

<a href="javascript:confirmDelete('delete.page?id=1')">Delete</a>