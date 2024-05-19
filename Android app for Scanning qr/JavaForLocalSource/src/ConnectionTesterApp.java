import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class TrialApp {
    public static void main(String[] args) {
        try {
            Connection con=ConnectionManager.getInstance().getConnection();
            Statement statement=con.createStatement();
            ResultSet resultSet=statement.executeQuery("select * from temptable");
            while(resultSet.next()){
                System.out.println(resultSet.getInt(1)+" "+resultSet.getInt(2));
            }
            ConnectionManager.getInstance().closeConnection();
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }
    }
}
//2021998 69
//    2021999 69
