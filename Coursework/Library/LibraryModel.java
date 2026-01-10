package Coursework.Library;

import java.util.ArrayList;

public class LibraryModel {
    private ArrayList<Book> bookList = new ArrayList<>();

    public void addBook(Book book){
        bookList.add(book);
    }
    public void deleteBooks(){
        bookList.clear();
    }
    public Book searchBook(String author){
        for(Book book : bookList){
            if(book.getAuthor().equals(author)){
                return book;
            }
        }
        return null;
    }
}
