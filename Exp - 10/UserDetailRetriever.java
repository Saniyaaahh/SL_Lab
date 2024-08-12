import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.DocumentBuilder;
import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.NodeList;
import java.io.File;
import java.util.Scanner;

public class UserDetailRetriever {

    public static void main(String[] args) {
        try {
            // Load and parse the XML file
            File xmlFile = new File("users.xml");
            DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
            DocumentBuilder dBuilder = dbFactory.newDocumentBuilder();
            Document doc = dBuilder.parse(xmlFile);

            // Normalize the XML structure
            doc.getDocumentElement().normalize();

            // Input user ID
            Scanner scanner = new Scanner(System.in);
            System.out.print("Enter User Id: ");
            int userId = scanner.nextInt();
            scanner.close();

            // Get all <user> elements
            NodeList nodeList = doc.getElementsByTagName("user");

            // Iterate through users and find matching ID
            boolean userFound = false;
            for (int i = 0; i < nodeList.getLength(); i++) {
                Element user = (Element) nodeList.item(i);
                int id = Integer.parseInt(user.getElementsByTagName("userId").item(0).getTextContent());

                // Check if this user's ID matches the input ID
                if (id == userId) {
                    userFound = true;
                    String username = user.getElementsByTagName("username").item(0).getTextContent();
                    String email = user.getElementsByTagName("email").item(0).getTextContent();
                    int age = Integer.parseInt(user.getElementsByTagName("age").item(0).getTextContent());

                    System.out.println("User Details:");
                    System.out.println("User Id: " + id);
                    System.out.println("Username: " + username);
                    System.out.println("Email: " + email);
                    System.out.println("Age: " + age);
                    break; // Exit after finding the user
                }
            }

            // If no matching user is found
            if (!userFound) {
                System.out.println("User with User Id " + userId + " not found.");
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
