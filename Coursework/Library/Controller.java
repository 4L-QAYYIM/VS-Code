package Coursework.Library;

public class Controller {
    LibraryModel model;
    View view;

    Controller(LibraryModel model, View view){
        this.model = model;
        this.view = view;

        this.view.deleteBooks.addActionListener(e -> {
            this.model.deleteBooks();
            this.view.tableModel.setRowCount(0);
        });

        this.view.addBook.addActionListener(e -> {
            Book book = this.view.addFieldBook();
            
            if (book != null) {
                this.model.addBook(book);
                this.view.tableModel.addRow(new Object[] {
                    book.getBookName(),
                    book.getAuthor(),
                    book.getYearOfPublication(),
                    book.getIsAvailable()
                });
            }
        });

        this.view.searchBook.addActionListener(e -> {
            if(this.view.searchField.getText() != null){
                Book a = model.searchBook(this.view.searchField.getText());

                this.view.searchBook(a);

                this.view.searchField.setText("");
            }
        });
    }
}
