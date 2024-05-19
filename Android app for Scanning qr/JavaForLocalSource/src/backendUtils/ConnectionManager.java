package backendUtils;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class ConnectionManager {
    // Singleton instance
    private static ConnectionManager instance = null;
    // JDBC connection object
    private Connection connection = null;

    // Private constructor to prevent instantiation from outside
    // default constructor uses root database for local access
    private ConnectionManager() {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            // JDBC connection parameters
            String url = "jdbc:mysql://localhost:3306/androidapptestdatabase";
            String username = "root";
            String password = "";
            connection = DriverManager.getConnection(url, username, password);
        } catch (ClassNotFoundException | SQLException e) {
            e.printStackTrace();
        }
    }

    // parameterised constructor for custom connection
    private ConnectionManager(String myUrl,String myUsername,String myPassword){
        try{
            Class.forName("com.mysql.cj.jdbc.Driver");
            connection=DriverManager.getConnection(myUrl,myUsername,myPassword);
        } catch (ClassNotFoundException | SQLException e){
            e.printStackTrace();
        }
    }

    // Method to get the singleton instance
    public static ConnectionManager getInstance() {
        if (instance == null) {
            instance = new ConnectionManager();
        }
        return instance;
    }
    public ConnectionManager getInstance(String url,String username,String password){
        if(instance == null){
            instance=new ConnectionManager(url,username,password);
        }
        return instance;
    }

    // Method to get the connection object
    public Connection getConnection() {
        return connection;
    }

    // Method to close the connection
    public void closeConnection() {
        if (connection != null) {
            try {
                connection.close();
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
    }
}
