package Coursework.TodoList;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.JTextField;
import javax.swing.table.DefaultTableModel;
import java.awt.BorderLayout;
import java.awt.GridLayout;

public class View {
    // frame - main window
    // deleteAll - button which deletes all task
    // addTask - button which adds one task
    // colums - names of rows of the table
    // table - table which contains tasks
    // taskTable - contains table for printing
    // name - name of a new task
    JFrame frame = new JFrame();
    JButton deleteAll = new JButton("Delete all");
    JButton addTask = new JButton("Add task");
    String colums[] = {"Name", "Status"};
    DefaultTableModel table;
    JTable taskTable;
    JTextField name = new JTextField();

    // Default construction
    View(){
        // Set frame parameters
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setSize(500,500);
        frame.setLayout(new BorderLayout());

        // Set table parameters
        table = new DefaultTableModel(colums, 0) {
            @Override
            public Class<?> getColumnClass(int index) {
                if (index == 1) {
                    return Boolean.class;
                }
                return String.class;
            }
        };
        taskTable = new JTable(table);

        // Including the table into the frame
        frame.add(new JScrollPane(taskTable), BorderLayout.CENTER);

        // Making button panel
        JPanel buttonPanel = new JPanel();
        buttonPanel.setLayout(new GridLayout(3,1));

        // Including the text field and buttons into the panel
        buttonPanel.add(name);
        buttonPanel.add(addTask);
        buttonPanel.add(deleteAll);

        // Inluding the panel into the frame
        frame.add(buttonPanel, BorderLayout.SOUTH);

        // Set frame visivle
        frame.setVisible(true);
    }
}
