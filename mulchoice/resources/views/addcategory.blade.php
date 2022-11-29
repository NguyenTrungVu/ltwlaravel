
<form method='post' action='/category'>
    @csrf
    <div class="mb-3 mt-3">
      <label for="email" class="form-label">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="name">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>