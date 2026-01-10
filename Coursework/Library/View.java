package Coursework.Library;

import javax.swing.JButton;
import javax.swing.JCheckBox;
import javax.swing.JDialog;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTextField;
import javax.swing.table.DefaultTableModel;
import javax.swing.JTable;
import java.awt.BorderLayout;
import java.awt.GridLayout;

public class View {
    JFrame frame = new JFrame("Library");
    JTextField searchField = new JTextField();
    JButton addBook = new JButton("Add");
    JButton deleteBooks = new JButton("Delete");
    JButton searchBook = new JButton("Search");
    String namesOfColumns[] = {"Name", "Author", "Year", "Status"};
    DefaultTableModel tableModel;
    JTable table;

    View(){
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setSize(600, 700);
        frame.setLayout(new BorderLayout());

        tableModel = new DefaultTableModel(namesOfColumns, 0){
            @Override
            public Class<?> getColumnClass(int index) {
                if (index == 3) {
                    return Boolean.class;
                }
                return String.class;
            }
        };
        table = new JTable(tableModel);

        frame.add(new JScrollPane(table), BorderLayout.CENTER);

        JPanel lowerPanel = new JPanel(new GridLayout(2,1));

        JPanel searchPanel = new JPanel(new BorderLayout());
        searchPanel.add(searchField, BorderLayout.CENTER);
        searchPanel.add(searchBook, BorderLayout.EAST);
        lowerPanel.add(searchPanel);

        JPanel buttonPanel = new JPanel();
        buttonPanel.add(addBook);
        buttonPanel.add(deleteBooks);
        lowerPanel.add(buttonPanel);

        frame.add(lowerPanel, BorderLayout.SOUTH);
        frame.setVisible(true);
    }

    public Book addFieldBook() {
        JDialog addDialog = new JDialog(frame, "Add new book", true);
        addDialog.setLayout(new BorderLayout());

        JTextField nameField = new JTextField();
        JTextField authorField = new JTextField();
        JTextField yearField = new JTextField();
        JCheckBox statusCheck = new JCheckBox("Available");

        JPanel inputPanel = new JPanel(new GridLayout(4, 2));
        inputPanel.add(new JLabel("Name:")); inputPanel.add(nameField);
        inputPanel.add(new JLabel("Author:")); inputPanel.add(authorField);
        inputPanel.add(new JLabel("Year:")); inputPanel.add(yearField);
        inputPanel.add(new JLabel("Status:")); inputPanel.add(statusCheck);

        final Book[] resultBook = {null};

        JButton saveButton = new JButton("Save");
        saveButton.addActionListener(e -> {
            Book b = new Book();
            b.setBookName(nameField.getText());
            b.setAuthor(authorField.getText());
            try {
                b.setYearOfPublication(Integer.parseInt(yearField.getText()));
            } catch (NumberFormatException ex) {
                b.setYearOfPublication(0);
            }
            b.setIsAvailable(statusCheck.isSelected());
            
            resultBook[0] = b;
            addDialog.dispose();
        });

        addDialog.add(inputPanel, BorderLayout.CENTER);
        addDialog.add(saveButton, BorderLayout.SOUTH);
        
        addDialog.pack();
        addDialog.setLocationRelativeTo(frame);
        addDialog.setVisible(true);

        return resultBook[0];
    }

    public void searchBook(Book book){
        if(book != null){
            JFrame searchFrame = new JFrame("The book was finded!");
            searchFrame.setSize(300, 100);
            searchFrame.setLayout(new GridLayout(2, 1));

            JPanel infoPanel = new JPanel();

            JLabel name = new JLabel(book.getBookName());
            JLabel author = new JLabel(book.getAuthor());
            JLabel year = new JLabel(String.valueOf(book.getYearOfPublication()));
            JLabel status = new JLabel(String.valueOf(book.getIsAvailable()));

            infoPanel.add(name);
            infoPanel.add(author);
            infoPanel.add(year);
            infoPanel.add(status);

            JButton okButton = new JButton("OK");
            okButton.addActionListener(e -> {
                searchFrame.setVisible(false);
            });

            searchFrame.add(infoPanel);
            searchFrame.add(okButton);
            searchFrame.setVisible(true);
        }
    }
}
