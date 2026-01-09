package Coursework.TodoList;

public class Controller {
    // Declaring the model and the view
    private TodoModel model;
    private View view;

    // Default construction
    Controller(TodoModel model, View view){
        this.model = model;
        this.view = view;

        // Adding the listener for the button "deleteAll"
        this.view.deleteAll.addActionListener(e -> {
            model.deleteAll();
            view.table.setRowCount(0);
        });

        // Adding the listener for the button "addTask"
        this.view.addTask.addActionListener(e -> {
            Task task = new Task();
            task.setName(view.name.getText());
            task.setStatus(false);
            model.addTask(task);
            view.table.addRow(new Object[]{
                task.getName(), task.getStatus()
            });
            view.name.setText("");
        });

        // Adding the listener for the table
        this.view.table.addTableModelListener(e -> {
            int row = e.getFirstRow();
            int column = e.getColumn();

            if (column == 1){
                boolean newStatus = (boolean) view.table.getValueAt(row, column);
                model.getTask(row).setStatus(newStatus);
            }
        });
    }
}
