<!-- // Model -->

<?php
class Options_model extends CI_Model {

    public function get_options() {
        $query = $this->db->get('options');
        return $query->result();
    }
}
?>
<!-- // Controller -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Options extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('options_model');
    }

    public function index() {
        $data['options'] = $this->options_model->get_options();
        $this->load->view('options_view', $data);
    }
}
?>

<!-- // View -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Options List</title>
</head>
<body>
    <h2>Select Options</h2>
    <form>
        <label for="options">Choose an option:</label>
        <select id="options" name="options">
            <?php foreach ($options as $option) : ?>
                <option value="<?= $option->id ?>"><?= $option->name ?></option>
            <?php endforeach; ?>
        </select>
    </form>
</body>
</html>
